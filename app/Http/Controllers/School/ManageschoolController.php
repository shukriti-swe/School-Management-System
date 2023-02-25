<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Role;
use App\Models\Permission;
use App\Events\Backend\UserCreated;
use App\Models\School;
use App\Models\Grade;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\EmailInfo;
use App\Models\Students;
use App\Models\EmailNotification;
use App\Models\Event;
use App\Models\AdminOthers;
use App\Models\ClassSchedule;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

use File;
use DB;

class ManageschoolController extends Controller
{
    public function index()
    {
        $userId = Session::get('user_id');
        $school = School::with(['user', 'schedules'])
        ->where('user_id', $userId)
        ->get()
        ->first();

        return view('school.index', [
            'school' => $school,
        ]);
    }
    public function profileEdit()
    {
        $userId = Session::get('user_id');
        $schoolId = School::where('user_id', $userId)->first();
        $school = School::with('ClassSchedule')->find($schoolId['id'])->toArray();

        $grade = Grade::all();
      //echo '<pre>'; print_r($school); die();
        return view('school.profile.edit_profile',[
            'school' => $school,
            'grade'=>$grade
        ]);
    }

    public function updateSchool(Request $req)
    {

        $schhol_id = $req->school_id;
     

        $email = $req->school_email;

        $validatedData = $req->validate([
            'school_name' => 'required',
            'address' => 'required',
            'year_establish' => 'required',
            'incharge_name' => 'required',
            'incharge_email' => 'required',
            'contact_number' => 'required',
        ]);

        $user = User::where('email', $req->official_email_id)->first();
        // echo $req->official_email_id; die();
        // echo '<pre>'; print_r($user); die();

        if (!empty($user)) {

            if ($user['email'] == $req->official_email_id && $user['id'] == $req->user_id) {
                $user = User::find($req->user_id);
                $user->name = $req->school_name;
                $user->email = $req->official_email_id;
                $user->save();
            } else {
                return redirect()->back()->with('email_faild', 'Sorry Incharge Email Already Exits.');
            }
        } else {
            $user = User::find($req->user_id);
            $user->name = $req->school_name;
            $user->email = $req->official_email_id;
            $user->save();
        }

        $user_profile = Userprofile::where('user_id', $req->user_id)->first();
        $user_profile->email = $req->official_email_id;
        $user_profile->name = $req->school_name;
        $user_profile->save();

        //incharge email--------------------
        $school_row = School::where('incharge_email', $req->incharge_email)->first();

        if (!empty($school_row)) {
            if ($school_row['incharge_email'] == $req->incharge_email && $school_row['id'] == $req->school_id) {
                $data['incharge_email'] = $req->incharge_email;
            } else {
                return redirect()->back()->with('email_faild', 'Sorry incharge email id Already Exits.');
            }
        } else {
            $data['incharge_email'] = $req->incharge_email;
        }

        $data['school_name'] = $req->school_name;
        $data['school_address'] = $req->address;
        $data['year_establish'] = $req->year_establish;
        $data['incharge_name'] = $req->incharge_name;
        $data['official_email_id'] = $req->official_email_id;
        $data['contact_number'] = $req->contact_number;
        $data['kidspreneurship_representative'] = $req->partner_name;
        $data['course_start_date'] = $req->course_start_date;
        $data['entrepreneurship_lab'] = $req->entrepreneurship_lab;
        $data['membership_plan'] = $req->membership_plan;

        $school_logo = $req->school_logo;
        $school_cover = $req->school_cover_image;

        $old_school_logo = $req->old_school_logo;
        $old_cover_image = $req->old_cover_image;

        if ($school_logo) {

            if ($old_school_logo != '') {
                if (File::exists($old_school_logo)) {
                    unlink($old_school_logo);
                }
            }

            $image_name = Str::random(10); //unique nmae generate every time
            $ext = strtolower($school_logo->getClientOriginalExtension());
            $image_full_name = 'school_' . $image_name . '.' . $ext;
            $upload_path = 'image/school/';
            $success = $school_logo->move($upload_path, $image_full_name);
            $data['school_logo'] = $upload_path . $image_full_name;
        }

        if ($school_cover) {

            if ($old_cover_image != '') {
                if (File::exists($old_cover_image)) {
                    unlink($old_cover_image);
                }
            }

            $excel_name = Str::random(10); //unique nmae generate every time
            $ext = strtolower($school_cover->getClientOriginalExtension());
            $image_full_name = 'cover_' . $excel_name . '.' . $ext;

            $upload_path = 'image/school/cover_image/';
            $success = $school_cover->move($upload_path, $image_full_name);

            $data['school_cover_image'] = $upload_path . $image_full_name;
        }

        // echo 11; die();

        /*=================================================
                        CSV Upload Start
        ==================================================*/
        $csvUpload = $req->file('upload_csv');
        if ($csvUpload) {
            // echo '<pre>'; echo "csv"; die();
            
            $fileType = $csvUpload->getClientOriginalExtension();
            $fileName = 'student_' . Str::random(10) . '.' . $fileType;
            $csvUpload->move('csv/upload/', $fileName);

            $handle = fopen(public_path('csv/upload/' . $fileName), "r");


            $module_name = 'users';
            $module_name_singular = Str::singular($module_name);

            $i = 1;
            while ($row = fgetcsv($handle)) {
                if ($i != 1) {

                    $user = User::where('email', $row[9])->first();
                    if (!empty($user)) {
                        return redirect()->back()->with('csv_email_faild', 'Sorry Duplicate Student Email!!');
                    }

                    $email = filter_var($row[9], FILTER_SANITIZE_EMAIL);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return redirect()->back()->with('csv_invalid_email', $email.' is not a valid email address!!');
                    }
                    
                    $data_array = $req->except('_token', 'roles', 'permissions', 'password_confirmation');
                    $data_array['name'] = $row[0];
                    $data_array['email'] = $row[9];
                    $data_array['group'] = 4;
                    $data_array['password'] = Hash::make("student");
                    $data_array['date_of_birth'] = $row[13];
                    $data_array['gender'] = $row[15];
                    $data_array['mobile'] = $row[10];

                    // echo '<pre>'; print_r($data_array); die();
            
                    if ($req->confirmed == 1) {
                        $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
                    } else {
                        $data_array = Arr::add($data_array, 'email_verified_at', null);
                    }
            
                    $$module_name_singular = User::create($data_array);
                    $user_id = DB::getPdo()->lastInsertId(); 
                    
                    $roles = Role:: select('name')->where('id',8)->get()->toArray();
                    $permissions = Permission:: select('name')->whereIn('id',[1,42])->get()->toArray();
                    $permission= array();
                    $role= array();
                    foreach($roles as $getrole){
                       $role[]= $getrole['name'];
                    }
        
                    foreach($permissions as $getper){
                        $permission[]= $getper['name'];
                     }
        
                     $module_name_singular = Str::singular('user');
        
                     if (isset($roles)) {
                        $$module_name_singular->syncRoles($roles);
                    } else {
                        $roles = [];
                        $$module_name_singular->syncRoles($roles);
                    }
            
                    // Sync Permissions
                    if (isset($permissions)) {
                        $$module_name_singular->syncPermissions($permissions);
                    } else {
                        $permissions = [];
                        $$module_name_singular->syncPermissions($permissions);
                    }

                    $id = $$module_name_singular->id;
                    $username = config('app.initial_username') + $id;
                    $$module_name_singular->username = $username;
                    $$module_name_singular->save();

                    event(new UserCreated($$module_name_singular));

                    $students = new Students();
                    $students->user_id = $user_id;
                    $students->school_id = $schhol_id;
                    $students->name = $row[0];
                    $students->project = $row[1];
                    $students->assignment = $row[2];
                    $students->classes_held = $row[3];
                    $students->classes_attended = $row[4];
                    $students->attendance = $row[5];
                    $students->overal_grade = $row[6];
                    $students->father_name = $row[7];
                    $students->mother_name = $row[8];
                    $students->address = $row[11];
                    $students->blood_group = $row[12];
                    $students->activity_incharge = $row[14];
                    $students->grade_id = $row[16];
                    $students->save();

                   



                    //Student Account Mail
                    
                    $email = $row[9];
                    $emailSub = "Student created!!";

                    $emailBody = "Student Name: ".$row[0]."<br>";
                    $emailBody .= "Student Username: ".$row[9]."<br>";
                    $emailBody .= "Student Password: student <br>";

                    $emailBody .= "Please login your dashboard by clicking this link <a href='".url('school/dashboard')."'>click here</a> <br>";
                    $emailBody .= 'Thanks <br> Kidspreneurship';
                    
                    
                    $student = array('email'=> $email,'subject'=> $emailSub);
                    
                    file_put_contents('../resources/views/mail.blade.php',$emailBody);
                    
                    Mail::send('mail', $student, function($message) use ($student){
                        $message->to($student['email'], 'Kidspreneurship')->subject($student['subject']);
                    });


                    $student_email = new EmailInfo;
                    $student_email->name = $row[0];
                    $student_email->mail_address = $email;
                    $student_email->mail_description = $emailBody;
                    $student_email->group = 4;
                    $student_email->save();
                }
                $i++;
            }
            

            // die();
        }

        /*=================================================
                        CSV Upload End
        ==================================================*/

        $day = $req->day;
        $grade = $req->grade;
        $start_time = $req->start_time;
        $end_time = $req->end_time;
        // echo '<pre>';
        // print_r($day);
        // die();
        //Previous all class schedule delete by this school id---
        ClassSchedule::where('school_id', $schhol_id)->delete();

        $ClassSchedule = new ClassSchedule();
        if(!empty($day))
        {
        foreach ($req->day as $key => $days) {
            if(!empty($day[$key]))
           {
            ClassSchedule::create([
                'school_id' => $schhol_id,
                'day' => $day[$key],
                'grade'=>$grade[$key],
                'start_time' => $start_time[$key],
                'end_time' => $end_time[$key]
            ]);
           }
        }
        }

        $success = School::where("id", $schhol_id)->update($data);

        //Email send to super admin----------------

        $email_body='Now You can allocate Trainer';
        file_put_contents('../resources/views/mail.blade.php',$email_body);

        $super_admin_email=User::where('group',1)->select('email')->first()->toArray(); 

        $datas_new = array('email' => $super_admin_email['email'], 'subject' =>'Allocate trainer');

        $send_mail = Mail::send('mail', $datas_new, function ($message) use ($datas_new) {
            $message->to($datas_new['email'])->subject($datas_new['subject']);
        });
        /* End Super Admin */
        
        //Start Email send section-----
        $notification = EmailNotification::find(10)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{action_by}"];
        $change_to = ['kidspreneurship', $data['school_name'], "Super admin"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);
        file_put_contents('../resources/views/mail.blade.php', $email_body);
        $data = array('email' => $data['incharge_email'], 'subject' => $notification['mail_sub']);

        $send_mail = Mail::send('mail', $data, function ($message) use ($data) {
            $message->to($data['email'], 'Tutorials Point')->subject($data['subject']);
        });

        /*End  Email section */
        if ($notification) {
            $school_email = new EmailInfo;
            $school_email->name = $req->school_name;
            $school_email->mail_description = $email_body;
            $school_email->group = 2;
            $school_email->save();
        }
        if ($success) {
            $notification = array(
                'message' => 'School successfully Updated!',
                'success' => 'success',
            );
            return redirect('/school/profile/edit')->with('message', 'School successfully Updated!');
        }
    }

    public function eventList(){
        $event = Event::all();
        return view('school.event.event_list', [
            'event' => $event
        ]);
    }

    public function eventView($id){
        $event = Event::find($id);
        return view('school.event.view_event', [
            'event' => $event
        ]);
    }

    public function privacyPolice(){

        $user_id = Session::get('user_id');
        $user = User::where('id',$user_id)->first()->toArray();

        $terms = AdminOthers::where('setting_name','school')->first()->toArray();

        // dd($user);
        // dd($terms);

        return view('school.terms.privacy_police', [
            'terms' => $terms,
            'user' => $user,
        ]);
    }

    public function savePrivacyPolice(Request $request)
    {
        // echo 11; die();
        $validated = $request->validate([
            'termandcondition' => 'required',
        ]);

        $user_id = Session::get('user_id');
        $termsandcondition  = $request->termandcondition;

        $user = User::where('id',$user_id)->first();
        $user->termandcondition = $termsandcondition;
        $user->save();

        return redirect('school/privacy/police/')->with('success', 'Terms and condition accepted.');
    }
}
