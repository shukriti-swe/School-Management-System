<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\grade;
use App\Models\EmailNotification;
use App\Models\Trainer;
use App\Models\Userprofile;
use Illuminate\Support\Str;
use App\Events\Backend\UserCreated;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ModelHasRoles;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\EmailInfo;
use App\Models\Students;
use App\Models\NotificationInfo;
use App\Models\School;
use Auth;
use Log;
use File;
use Image;
use DB;
use Hash;

class TrainerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:trainer_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }
    public function addTrainer(){
        
       return view('backend.trainer.add_trainer');
    }

    public function storeTrainer(Request $request){
        // echo url('/login'); die();
        $validated = $request->validate([
            'trainer_name' => 'required',
            'email' => 'required',
            'trainer_fee' => 'required',
            'contact_no' => 'required',
        ]);

        $user= User:: where('email',$request->email)->first();
        if(empty($user)){

            $module_name = $this->module_name;
            $module_name_singular = Str::singular($module_name);

            $data_array = $request->except('_token', 'roles', 'permissions', 'password_confirmation');
            $data_array['name'] = $request->trainer_name;
            $data_array['password'] = Hash::make("trainer");
            $data_array['group'] = 3;

            if ($request->confirmed == 1) {
                $data_array = Arr::add($data_array, 'email_verified_at', Carbon::now());
            } else {
                $data_array = Arr::add($data_array, 'email_verified_at', null);
            }
    
            $$module_name_singular = User::create($data_array);
            $user_id = DB::getPdo()->lastInsertId();

            $roles = Role:: select('name')->where('id',6)->get()->toArray();
            $permissions = Permission:: select('name')->whereIn('id',[1,40])->get()->toArray();
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
            
            // Username
            $id = $$module_name_singular->id;
            $username = config('app.initial_username') + $id;
            $$module_name_singular->username = $username;
            $$module_name_singular->save();

            event(new UserCreated($$module_name_singular));
            
        }else{
            return redirect()->back()->with('email_faild', 'Sorry Email Already Exits.');
        }
        
        
        $trainer= new trainer;
        $trainer->user_id = $user_id;
        $trainer->trainer_name = $request->trainer_name;
        $trainer->official_email_id= $request->email;
        $trainer->trainer_fee= $request->trainer_fee;
        $trainer->contact_no= $request->contact_no;
        $trainer->save();

        $trainer = Trainer::with('user')->find($trainer->id)->toArray();
        // echo "<pre>"; print_r($trainer); die();

        $user = $trainer['user'];
        $email = $trainer['official_email_id'];
        $emailSub = "New trainer created!!";
        $emailBody = "Trainer Name: ".$trainer['trainer_name']."<br>";
        $emailBody .= "Your Username: ".$trainer['official_email_id']."<br>";
        $emailBody .= "Your Password: ".'trainer'. "<br>";
        $emailBody .= "Please login your dashboard by clicking this link <a href='".url('admin/dashboard')."'>click here</a> <br>";
        $emailBody .= 'Thanks <br> Kidspreneurship';
        // die();

        // die();
        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        Mail::send('mail', $data, function($message) use ($data){
            $message->to($data['email'], 'kidspreneurship')->subject
               ($data['subject']);
        });

        if($trainer) {   
            $trainer_email = new EmailInfo;
            $trainer_email->name = $trainer['trainer_name'];
            $trainer_email->mail_address = $email;
            $trainer_email->mail_description = $emailBody;
            $trainer_email->group = 3;
            $trainer_email->save();
        }

        return redirect()->route('backend.trainerlist.trainerList')->with('success', 'Data Stored successfully.');
    }

    public function trainerList(){
        $trainers = Trainer::with('user')->get()->toArray();
        // echo '<pre>'; print_r($trainers); die();

        return view('backend.trainer.trainer_list')->with('trainers',$trainers);
    }
    public function trainerEdit($id){
    
        $trainer = Trainer::find($id)->toArray();
    
       return view('backend.trainer.edit_trainer')->with('trainer',$trainer); 
    }

    public function updateTrainer(Request $request){
        
        // echo "<pre>"; print_r($_POST); die();


        $validated = $request->validate([
            'trainer_name' => 'required',
            'official_email_id' => 'required',
            'incharge_email' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'city' => 'required',
            'address' => 'required',
            'join_date' => 'required',
            //'image' => 'required',
            'mode' => 'required',
            'type' => 'required',
            'status' => 'required',
            'no_of_hour_per_week' => 'required',
        ]);
        

        //echo $request->user_id;die();

        $user= User:: where('email',$request->official_email_id)->first();
        //echo "<pre>"; print_r($user); die();

        if(!empty($user)){
            
            if($user['email']==$request->official_email_id && $user['id']==$request->user_id){
                $user= User:: find($request->user_id);
                $user->name = $request->trainer_name;
                $user->email = $request->official_email_id;
                $user->save();
            }else{
                return redirect()->back()->with('email_faild', 'Sorry Email Address Already Exits');
            }
        }else{

            $user= User:: find($request->user_id);
            $user->name = $request->trainer_name;
            $user->email = $request->official_email_id;

            $user->save();
        }

        $user_profile= Userprofile:: where('user_id',$request->user_id)->first();
        $user_profile->email = $request->official_email_id;
        $user_profile->name = $request->trainer_name;
        $user_profile->save();

        $request_image = $request->file('image');
        
        if(!empty($request_image)){

        $image = Image::make($request_image);
        $image_path = 'image/trainer/';
        $img_name = time().'.'.$request_image->getClientOriginalExtension();
        $image->save($image_path.$img_name);

        $image_name = $image_path."thumbnail/".$img_name;
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });
         
        $image->save($image_name);
        }else{
            if(empty($request->pre_image)){
                $image_name = $request->pre_image;
            }
           
        }
        
        
        $trainer= trainer:: find($request->id);
        $trainer->trainer_name = $request->trainer_name;

        $trainer->official_email_id= $request->official_email_id;
        $trainer->incharge_email= $request->incharge_email;

        $trainer->contact_no= $request->contact_no;
        $trainer->address= $request->address;
        $trainer->city= ucfirst($request->city);
        $trainer->join_date = $request->join_date;
        $trainer->date_of_birth= $request->date_of_birth;
        $trainer->image = $image_name;
        $trainer->mode= $request->mode;
        $trainer->type = $request->type;
        $trainer->status = $request->status;
        $trainer->no_of_hour_per_week = $request->no_of_hour_per_week;
        $trainer->save();
        // echo "<pre>"; print_r($trainer); die();


        $getTrainer = Trainer::with('user')->find($request->id)->toArray();

        $user = $getTrainer['user'];
        $email = $getTrainer['official_email_id'];
        echo $emailSub = "Trainer information updated!! <br>";
        $emailBody = "Trainer Name: ".$getTrainer['trainer_name']."<br>";
        $emailBody .= "Your Username: ".$getTrainer['official_email_id']."<br>";
        $emailBody .= "Your Password: ". 123456 . "<br>";
        $emailBody .= "Please login your dashboard by clicking this link <a href='".url('/login')."'>click here</a> <br>";
        echo $emailBody .= 'Thanks <br> Kidspreneurship';

        // die();
        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        Mail::send('mail', $data, function($message) use ($data){
            $message->to($data['email'], 'kidspreneurship')->subject
               ($data['subject']);
        });

        if($trainer) {   
            $trainer_email = new EmailInfo;
            $trainer_email->name = $getTrainer['trainer_name'];
            $trainer_email->mail_address = $email;
            $trainer_email->mail_description = $emailBody;
            $trainer_email->group = 3;
            $trainer_email->save();
        }

        return redirect()->route('backend.trainerlist.trainerList')->with('update_success', 'Data Updated successfully.');
    }

    public function trainerDelete($ids){
        
        $all_ids = explode('|', $ids);
        $trainer_id = $all_ids[0];
        $user_id = $all_ids[1];
        
        DB::table('users')->where('id',$user_id)->delete();

        $data = Trainer :: find($trainer_id);
        if(!is_null($data)){
            $data->delete(); 
        }
        return redirect()->route('backend.trainerlist.trainerList')->with('update_success', 'Data deleted successfully.');
    }

    //Send Notification Start

    public function trainerNotificationBox()
    {
        $notificationinfo = NotificationInfo::where('creator_id', 3)->get();

        return view('backend.trainer.notification.notification_box', [
            'notificationinfo' => $notificationinfo,
        ]);
    }

    public function trainerCompose()
    {
        $schools = School::get();
        $grades = grade::get();
        return view('backend.trainer.notification.compose', [
            'schools' => $schools,
            'grades' => $grades
        ]);
    }

    public function trainerNotificationSend(Request $request)
    {
        // echo 11; die();
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
                $notificationinfo->creator_id = 3;
                $notificationinfo->save();

                // $students = Students::find($student->id);
                // $students->sms_status = 1;
                // $students->save();
            }
        }

        return redirect('admin/trainer/notificationbox')->with('success', 'Notification Send Successfully.');

        // echo "<pre>"; print_r($smsinfo); die();
    }

    //Send Notification End

    public function trainerCheckInfo(Request $request)
    {
        
        $trainer = Trainer::find($request->id);

        if($request->action == 'checked'){

            if($request->info == 1){
                $trainer->assessment_done = 1;
                $result = $trainer->save();
            }
            if($request->info == 2){
                $trainer->demo_video = 1;
                $result = $trainer->save();
            }
            if($request->info == 3){
                $trainer->training_hour = 1;
                $result = $trainer->save();
            }

        }else{
            if($request->info == 1){
                $trainer->assessment_done = 0;
                $result = $trainer->save();
            }

            if($request->info == 2){
                $trainer->demo_video = 0;
                $result = $trainer->save();
            }

            if($request->info == 3){
                $trainer->training_hour = 0;
                $result = $trainer->save();
            }

        }
        
        echo json_encode($result);
        
    }

    //Trainer Suspend-------------------------------------
    public function trainerSuspend($id){
        $user = User::find($id);
        $user->suspend = 1;
        $user->save();

        $email = $user->email;

        $emailSub = "Your Trainer Account Suspended!! <br>";
        $emailBody = "Please contact Kidspreneurship administrator <br>";
        echo $emailBody .= 'Thanks <br> Kidspreneurship';

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
        $suspend_email->group = 3;
        $suspend_email->save();

        return redirect('admin/trainerlist')->with('suspend_success', 'Trainer Account Successfully Suspended!');
    }
    
    //Trainer UnSuspend-------------------------------------
    public function trainerUnsuspend($id){
        $user = User::find($id);
        $user->suspend = 2;
        $user->save();

        $email = $user->email;
        $emailSub = "Your Trainer Account Succussfully Unsuspended!!";
        $emailBody = "Welcome To Kidspreneurship <br>";
        $emailBody .= 'Thanks <br> Kidspreneurship';

        file_put_contents('../resources/views/mail.blade.php',$emailBody);
        $data = array('email'=> $email,'subject'=> $emailSub);
        
        Mail::send('mail', $data, function($message) use ($data){
            $message->to($data['email'], 'kidspreneurship')->subject($data['subject']);
        });

        $unsuspend_email = new EmailInfo;
        $unsuspend_email->name = $user->name;
        $unsuspend_email->mail_address = $email;
        $unsuspend_email->mail_description = $emailBody;
        $unsuspend_email->group = 3;
        $unsuspend_email->save();

        // echo '<pre>'; print_r($user); die();

        return redirect('admin/trainerlist')->with('suspend_success', 'Trainer Account Successfully Unsuspended!');
    }

} 