<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\School;
use App\Models\Userprofile;
use App\Models\User;
use App\Models\Grade;
use App\Models\EmailInfo;
use App\Models\EmailNotification;
use App\Models\ClassSchedule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
use App\Models\Students;
use App\Models\NotificationInfo;

use App\Events\Backend\UserCreated;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Permission;

class SchoolController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:school_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');
        $this->module_name = 'users';
    }

    public function schoolCreate()
    {
        $grade = Grade::all();
        return view('backend.school.add_school', compact('grade'));
    }

    public function schoolStore(Request $req)
    {
        $validatedData = $req->validate([
            'school_name' => 'required',
            'city' => 'required',
            'principle_name' => 'required',
            'country' => 'required',
            'number_of_student'=>'required',
            'membership_plan' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'fee_per_student' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if (empty($user)) {

            $module_name = $this->module_name;
            $module_name_singular = Str::singular($module_name);

            $data_array = $req->except('_token', 'roles', 'permissions', 'password_confirmation');
            $data_array['name'] = $req->school_name;
            $data_array['group'] = 2;
            $data_array['password'] = Hash::make("school");

            if ($req->confirmed == 1) {
                $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
            } else {
                $data_array = Arr::add($data_array, 'email_verified_at', null);
            }

            $$module_name_singular = User::create($data_array);
            $user_id = DB::getPdo()->lastInsertId();

            $roles = Role::select('name')->where('id', 7)->get()->toArray();
            $permissions = Permission::select('name')->whereIn('id', [1, 40])->get()->toArray();
            $permission = array();
            $role = array();
            foreach ($roles as $getrole) {
                $role[] = $getrole['name'];
            }

            foreach ($permissions as $getper) {
                $permission[] = $getper['name'];
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

            // Username
            $id = $$module_name_singular->id;
            $username = config('app.initial_username') + $id;
            $$module_name_singular->username = $username;
            $$module_name_singular->save();

            event(new UserCreated($$module_name_singular));
        } else {
            return redirect()->back()->with('email_faild', 'Sorry Email Already Exits.');
        }

        // echo 11; die();


        $school = new School();
        $school->school_name = $req->school_name;
        $school->city = $req->city;
        $school->principle_name = $req->principle_name;
        $school->country = $req->country;
        $school->official_email_id = $req->email;
        $school->contact_number = $req->contact_number;
        $school->membership_plan = $req->membership_plan;
        $school->user_id = $user_id;
        $school->number_of_student = $req->number_of_student;
        $school->fee_per_student = $req->fee_per_student;


        $success = $school->save();

        // if ($success) {

        //     //Data insert into class schedule-----------------
        //     $ClassSchedule = new ClassSchedule();
        //     $ClassSchedule->school_id = $school->id;
        //     $ClassSchedule->save();
        // }

        //Start Email send section-----
        $notification = EmailNotification::find(1)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{email}", "{pass}"];
        $change_to = ['kidspreneurship', $req->school_name, $req->email, "school"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);


        file_put_contents('../resources/views/mail.blade.php', $email_body);


        //$data = array('email' => $req->email, 'subject' => $notification['mail_sub']);


        // Mail::send('mail', $data, function ($message) use ($data) {
        //     $message->to($data['email'], 'Tutorials Point')->subject($data['subject']);
        // });
        
        $email_data = array('subject'=>$notification['mail_sub']);    
        $email_new[0]=$req->email;
        $email_new[1]='robelsust@gmail.com';
        
        $send_mail=Mail::send('mail',$email_data,function($message) use ($email_data,$email_new){
            $message->to($email_new)->subject($email_data['subject']);
        });

        if ($notification) {
            $school_email = new EmailInfo;
            $school_email->name = $req->school_name;
            $school_email->mail_description = $email_body;
            $school_email->group = 2;
            $school_email->save();
        }
        /*End  Email section */

        if ($success) {
            $notification = array(
                'message' => 'School successfully Inserted!',
            );
            return redirect()->route('backend.schoollist.schoolList')->with($notification);
        }
    }

    public function schoolList()
    {
        $school_list = School::with('user')->get();
        //echo '<pre>'; print_r($school_list); die();

        return view('backend.school.school_list', compact('school_list'));
    }

    public function schoolEdit($id)
    {
        $school = School::with('ClassSchedule')->find($id)->toArray();
        //    echo '<pre>';
        //    print_r($school);die();
        $grade = Grade::all();
        return view('backend.school.edit_school', compact('school', 'grade'));
    }

    public function schoolUpdate(Request $req)
    {
        //echo 11; die();
        $schhol_id = $req->school_id;
        $email = $req->school_email;

        $validatedData = $req->validate([
            'school_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'year_establish' => 'required',
            'incharge_name' => 'required',
            'incharge_email' => 'required',
            'contact_number' => 'required',
            'fee_per_student' => 'required',
        ]);

        $user = User::where('email', $req->official_email_id)->first();


        if (!empty($user)) {

            if ($user['email'] == $req->official_email_id && $user['id'] == $req->user_id) {
                $user = User::find($req->user_id);
                $user->name = $req->school_name;
                $user->email = $req->official_email_id;
                $user->save();
            } else {
                // echo 22; die();
                return redirect()->back()->with('email_faild', 'Sorry Official Email Already Exits.');
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
        $data['city'] = $req->city;
        $data['school_address'] = $req->address;
        $data['year_establish'] = $req->year_establish;
        $data['incharge_name'] = $req->incharge_name;
        $data['official_email_id'] = $req->official_email_id;
        $data['contact_number'] = $req->contact_number;
        $data['kidspreneurship_representative'] = $req->partner_name;
        $data['course_start_date'] = $req->course_start_date;
        $data['status'] = 1;
        $data['membership_plan'] = $req->membership_plan;
        $data['fee_per_student'] = $req->fee_per_student;

        $school_logo = $req->school_logo;
        $school_cover = $req->school_cover_image;

        $old_school_logo = $req->old_school_logo;
        $old_cover_image = $req->old_cover_image;

        if ($school_logo) {
            if($old_school_logo != ''){
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
            if($old_cover_image != ''){
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

        /*=================================================
                        CSV Upload Start
        ==================================================*/
        $csvUpload = $req->file('upload_csv');
        if ($csvUpload) {
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
                    echo $emailSub = "Student created!!";

                    $emailBody = "Student Name: ".$row[0]."<br>";
                    $emailBody .= "Student Username: ".$row[9]."<br>";
                    $emailBody .= "Student Password: student <br>";

                    $emailBody .= "Please login your dashboard by clicking this link <a href='".url('admin/dashboard')."'>click here</a> <br>";
                    echo $emailBody .= 'Thanks <br> Kidspreneurship';
                    
                    
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

        //Start Email send section-----
        $notification = EmailNotification::find(10)->toArray();

        $change = ["{app_name}", "{receiver_name}", "{action_by}"];
        $change_to = ['kidspreneurship', $data['school_name'], "Super admin"];
        $email_body = str_replace($change, $change_to, $notification['mail_body']);

        file_put_contents('../resources/views/mail.blade.php', $email_body);

        // echo $data['incharge_email']; die();

        $data = array('email' => $req->official_email_id, 'subject' => $notification['mail_sub']);


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

            return redirect()->route('backend.schoollist.schoolList')->with($notification);
        }
    }

    public function schoolDelete($id)
    {
        $data = School::find($id);



        if ($data->school_logo != '') {

            if (File::exists($data->school_logo)) {
                unlink($data->school_logo);
            }
        }
        if ($data->upload_excel != '') {
            if (File::exists($data->upload_excel)) {
                unlink($data->upload_excel);
            }
        }
        //echo $data->user_id;die();
        //$user = User::where('id', $data->user_id)->first();
        DB::table('users')->where('id',$data->user_id)->delete();

        $success = School::where('id', $id)->delete();

        if ($success) {
            $notification = array(
                'message' => 'School Successfully deleted!',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function viewschool($id)
    {
        $school = School::with(['user', 'schedules'])->find($id);       
        return view('backend.school.viewschool', compact('school'));
    }

    //Send Notification Start

    public function schoolNotificationBox()
    {
        // echo 11; die();
        $notificationinfo = NotificationInfo::with(['grade','school'])->where('creator_id', 2)->get();
        // dd($notificationinfo);

        return view('backend.school.notification.notification_box', [
            'notificationinfo' => $notificationinfo,
        ]);
    }

    public function schoolCompose()
    {
        $schools = School::get();
        $grades = grade::get();
        return view('backend.school.notification.compose', [
            'schools' => $schools,
            'grades' => $grades
        ]);
    }

    public function schoolNotificationSend(Request $request)
    {
        $getAllStudents = Students::with('user')->get();
        // dd($getAllStudents);

        foreach($getAllStudents as $student){
            if($student->school_id == $request->school_id && $student->grade_id == $request->grade_id){
                
                $notificationinfo = new NotificationInfo();
                $notificationinfo->school_id = $request->school_id;
                $notificationinfo->grade_id = $request->grade_id;
                $notificationinfo->receiver_id = $student->id;
                $notificationinfo->title = $request->title;
                $notificationinfo->description = $request->description;
                $notificationinfo->creator_id = 2;
                $notificationinfo->save();
            }
        }

        return redirect('admin/school/notificationbox')->with('success', 'Notification Send Successfully.');

        // echo "<pre>"; print_r($smsinfo); die();
    }

    //Send Notification End

    //School Suspend-------------------------------------

    public function schoolSuspend($id){
        $user = User::find($id);
        $user->suspend = 1;
        $user->save();

        $email = $user->email;

        $emailSub = "Your School Account Suspended!! <br>";
        $emailBody = "Please contact Kidspreneurship administrator <br>";
        $emailBody .= 'Thanks <br> Kidspreneurship';

        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        Mail::send('mail', $data, function($message) use ($data){
            $message->to($data['email'], 'kidspreneurship')->subject
                ($data['subject']);
        });

        $suspend_email = new EmailInfo;
        $suspend_email->name = $user->name;
        $suspend_email->mail_address = $email;
        $suspend_email->mail_description = $emailBody;
        $suspend_email->group = 2;
        $suspend_email->save();

        return redirect('admin/schoollist')->with('suspend_success', 'School Account Successfully Suspended!');
    }

    //School UnSuspend-------------------------------------
    public function schoolUnsuspend($id){
        $user = User::find($id);
        $user->suspend = 2;
        $user->save();

        $email = $user->email;
        $emailSub = "Your School Account Succussfully Unsuspended!!";
        $emailBody = "Welcome To Kidspreneurship <br>";
        $emailBody .= 'Thanks <br> Kidspreneurship';
        // die();

        // echo "<pre>"; print_r($trainer); die();

        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        Mail::send('mail', $data, function($message) use ($data){
            $message->to($data['email'], 'kidspreneurship')->subject
                ($data['subject']);
        });

        $unsuspend_email = new EmailInfo;
        $unsuspend_email->name = $user->name;
        $unsuspend_email->mail_address = $email;
        $unsuspend_email->mail_description = $emailBody;
        $unsuspend_email->group = 2;
        $unsuspend_email->save();
        // echo '<pre>'; print_r($user); die();

        return redirect('admin/schoollist')->with('suspend_success', 'School Account Unsuspended!');
    }
    
     public function studentList($id)
    {
         $grades = Grade::get()->toArray();
         $schools=School::where('id',$id)->get()->toArray();
         //echo '<pre>'; print_r($schools); die();
         $data['id']=$id;
        
         return view('backend.school.student.student_list',compact('grades','data','schools'));
    }
    
     public function student_list_datatable(Request $request)
    {
        $school_id=$request->school_id;
           if($request->grade_id != '')
        {
            $data = Students::with([
                'school' => function ($query) {
                    $query->select('id','school_name');
                },
                'stdUser','assignmentfiles','projectfiles','getproject'
            ])
            ->where('school_id',$school_id)
            ->where('grade_id', $request->grade_id)
            ->get()
            ->toArray();
        }
        else
        {
           $data=Students::with([
                'school' => function ($query) {
                    $query->select('id','school_name');
                },
                'stdUser','assignmentfiles','projectfiles','getproject'
            ])
            ->where('school_id',$school_id)
            ->get()
            ->toArray(); 

            // echo '<pre>';
            // print_r($data);
            // die();
        
        }
        if(request()->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionbtn='<a href="'.route('backend.student-delete', $row['id']).'"class="btn btn-block btn-danger btn-sm" id="deleteStudent"><i class="fas fa-trash"></i></a>
                ';
                return $actionbtn; 	

            })
            ->addColumn('assignment', function($row) {
                //echo '<pre>';
                //print_r($row['assignmentfiles']);
                 $html='';
                foreach($row['assignmentfiles'] as $assignments)
                {
                     //$assignment=$assignments['attachment'];
                     $html .='<a href="{{asset($assignment)}}" target="_blank" class="btn btn-sm btn-warning m-2">
                     <i class="fas fa-file-pdf"></i>
                    </a>';
                   
                }
                return $html;
            })
            ->addColumn('projects', function($row) {
              
                 $html='';
                 $i=1;
                foreach($row['getproject'] as $key=>$projects)
                {
                    // $url=asset("$projectfiles[attachment]"); 
                    //  $html .='<a href="'.$url.'" target="_blank" class="btn btn-sm btn-warning m-2">
                    //  <i class="fas fa-file-pdf"></i>
                    // </a>';
                    $html.=$i.'. '.$projects['title'].'<br>';
                    $i++;
                }
                return $html;
            })


            ->rawColumns(['action','assignment','projects','projects_status'])
            ->make(true);
        }
    }

    public function delete_existing_student(Request $req)
    {
       $schhol_id=$req->school_id;
       $all_student=Students::where('school_id',$schhol_id)->get()->toArray();
       
       if($all_student)
       {
            foreach($all_student as $all_students)
            {
            $user_id[]=$all_students['user_id'];
            }
            Students::where('school_id',$schhol_id)->delete();
            DB::table('users')->whereIn('id',$user_id)->delete();
            echo 1;  
       }
       else
       {
           echo 2; 
       }

    }

      public function student_delete($id)
    {
        $data = Students::find($id);
       

        if ($data->image != '') {

            if (File::exists($data->image)) {
                unlink($data->image);
            }
        }
        //echo $data->user_id;die();
        //$user = User::where('id', $data->user_id)->first();
        DB::table('users')->where('id',$data->user_id)->delete();

        $success = Students::where('id', $id)->delete();

        if ($success) {
            $notification = array(
                'message3' => 'Student Successfully deleted!',
            );
            return redirect()->back()->with($notification);
        }
    }
}
