<?php

namespace App\Http\Controllers\Trainer;
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
use App\Models\TodoModel;
use App\Models\Content;
use App\Models\Students;
use App\Models\TrainerAllocation;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\EmailInfo;
use App\Models\TrainerEducationBackground;
use App\Models\TrainerPastAchievements;

use Illuminate\Support\Facades\Session; 
use File;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('permission:trainer_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }

    public function index(){
        $myDate = date('Y-m-d');
        $today = date('w',strtotime($myDate));


        $userId = Session::get('user_id');
        $trainer=Trainer::where('user_id', $userId)->first();

        $data['today_trainer_schedule']=TrainerAllocation::where('trainer_id',$trainer->id)->where('day',$today)->get()->toArray();
        
        // echo '<pre>';
        // print_r($data);
        // die();
        $data['all_todo']=TodoModel::all();
        $data['content']= Content::orderBy('id','desc')->take(5)->get()->toArray();

        $data['trainer_schedule']=TrainerAllocation::where('trainer_id',$trainer->id)->get()->toArray();
        $data['students']=[];

        $get_schools=TrainerAllocation::where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();
        if(!empty($get_schools)){
            $school_ids=[];
           foreach($get_schools as $school){
             $school_ids[]= $school['school_id'];
           }

           $data['students'] = Students::whereIn('school_id',$school_ids)->orderBy('id','desc')->take(8)->get()->toArray();
       
        }

        $trainerAllocations = TrainerAllocation::where('trainer_id', Session::get('trainer_id'))->get()->toArray();
        
        $totalHour = 0;
        foreach($trainerAllocations as $allocation){

            $dateFrom = date_create($allocation['created_at']);
            $dateTo = date_create(date('Y-m-d'));

            $countDays = date_diff($dateFrom, $dateTo);
            $days = $countDays->days;

            $week = ceil($days / 7);

            $hour = $week * $allocation['class_duration'];
            $totalHour = $totalHour + $hour;
        }
        
        // echo "<pre>"; print_r($totalHour); die();
        // dd($allocation);

        return view('trainer.index', [
            'data' => $data,
            'totalHour' => $totalHour,
        ]);
    }

    
    public function profile()
    {
        $userId = Session::get('user_id');
        $trainer=Trainer::where('user_id', $userId)->first();

        $trainer_education=TrainerEducationBackground::where('trainer_id',$trainer->id)->get();

        $trainer_experience=TrainerPastAchievements::where('trainer_id',$trainer->id)->get();                     
       
        $data['trainer']=$trainer;
        $data['trainer_education']=$trainer_education;
        $data['trainer_experience']=$trainer_experience;

        return view('trainer.profile.profile')->with('datas',$data);
    }

    public function profile_update(Request $request)
    {
        $validated = $request->validate([
            'trainer_name' => 'required',
            'official_email_id' => 'required',
            'contact_no' => 'required',
            'address' => 'required',
            'city' => 'required',
            'date_of_birth'=>'required',
            'join_date' => 'required',
            //'image' => 'required',
            'mode' => 'required',
            'type' => 'required',
            'status' => 'required',
            'no_of_hour_per_week' => 'required',
        ]);

        $user= User:: where('email',$request->official_email_id)->first();

        if(!empty($user)){
            
            if($user['email']==$request->official_email_id && $user['id']==$request->user_id){
                $user= User:: find($request->user_id);
                $user->name = $request->trainer_name;
                $user->email = $request->official_email_id;
                $user->save();
            }else{
                return redirect()->back()->with('email_faild', 'Sorry Email Already Exits.');
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

        //profile update start----------
        $trainer= trainer:: find($request->id);

        $request_image = $request->image;
        $old_image= $request->pre_image; 
        
        if(!empty($request_image))
        {
            if($old_image != ''){
                $image_path = public_path('/image/trainer/');
                if(File::exists($image_path.$old_image)){
                    unlink($image_path.$old_image);
                }
            }
            
            $img_name = time().'.'.$request_image->getClientOriginalExtension();
            $upload_path='image/trainer/';
            $success=$request_image->move($upload_path,$img_name);
            $trainer->image=$img_name;
        }

        $trainer->trainer_name = $request->trainer_name;

        $trainer->official_email_id= $request->official_email_id;
        $trainer->contact_no= $request->contact_no;
        $trainer->address= $request->address;
        $trainer->city= ucfirst($request->city);
        $trainer->join_date = $request->join_date;
        $trainer->date_of_birth= $request->date_of_birth;
        $trainer->mode= $request->mode;
        $trainer->type = $request->type;
        $trainer->status = $request->status;
        $trainer->past_achievements = $request->past_achievements;
        $trainer->expertise = $request->expertise;
        $trainer->no_of_hour_per_week = $request->no_of_hour_per_week;
        $trainer->save();

        $school_name=$request->school_name;
        $school_location=$request->school_location;
        $degree=$request->degree;
        $pass_year=$request->pass_year;
        $gread=$request->gread;

 
         //Previous all data delete at Trainer Education Backgroundby this trainer id---
         TrainerEducationBackground::where('trainer_id',$request->id)->delete();

        foreach($school_name as $key=>$school_names)
        {
            TrainerEducationBackground::create([
                'trainer_id' => $request->id,
                'school_name' => $school_name[$key],
                'school_location' => $school_location[$key],
                'degree' => $degree[$key],
                'pass_year' => $pass_year[$key],
                'gread' => $gread[$key],
             ]);
        }

        
        /* Start Past Achievements-----------*/
        //Delete all previous data-------------------
        // TrainerPastAchievements::where('trainer_id',$trainer->id)
        //                       ->where('status',1)
        //                       ->delete();
        // $past_job_title=$request->job_title;
        // $past_employer=$request->employer;
        // $past_city_municipality=$request->city_municipality;
        // $past_country=$request->country;
        // $past_start_date=$request->start_date;
        // $past_end_date=$request->end_date;
      
        //  foreach($past_job_title as $key=>$past_job_titles)
        // {
        //     TrainerPastAchievements::create([
        //         'trainer_id'=>$request->id,
        //         'job_title' => $past_job_title[$key],
        //         'employer' => $past_employer[$key],
        //         'city_municipality' => $past_city_municipality[$key],
        //         'country' => $past_country[$key],
        //         'start_date' => $past_start_date[$key],
        //         'end_date' => $past_end_date[$key],
        //         'status' =>1,
        //      ]);
        // }
       /*End  Past Achievements */

        /* Prior Experience---------------------------*/
        //Delete all previous data-------------------
    
        TrainerPastAchievements::where('trainer_id',$trainer->id)->delete();
        $prior_job_title=$request->prior_job_title;

        $prior_employer=$request->prior_employer;
        $prior_city_municipality=$request->prior_city_municipality;
        $prior_country=$request->prior_country;
        $prior_start_date=$request->prior_start_date;
        $prior_end_date=$request->prior_end_date;
        
        foreach($prior_job_title as $key=>$prior_job_titles)
        {
            TrainerPastAchievements::create([
                'trainer_id'=>$request->id,
                'job_title' => $prior_job_title[$key],
                'employer' => $prior_employer[$key],
                'city_municipality' => $prior_city_municipality[$key],
                'country' => $prior_country[$key],
                'start_date' => $prior_start_date[$key],
                'end_date' => $prior_end_date[$key],
             ]);
        }
        /* End Prior Experience */

     /*Expertise---------------------------*/
        //Delete all previous data-------------------
        // TrainerPastAchievements::where('trainer_id',$trainer->id)
        //                       ->where('status',3)
        //                       ->delete();
        // $expertise_job_title=$request->expertise_job_title;
        // $expertise_employer=$request->expertise_employer;
        // $expertise_city_municipality=$request->expertise_city_municipality;
        // $expertise_country=$request->expertise_country;
        // $expertise_start_date=$request->expertise_start_date;
        // $expertise_end_date=$request->expertise_end_date;
        
        // foreach($expertise_job_title as $key=>$expertise_job_titles)
        // {
        //     TrainerPastAchievements::create([
        //         'trainer_id'=>$request->id,
        //         'job_title' => $expertise_job_title[$key],
        //         'employer' => $expertise_employer[$key],
        //         'city_municipality' => $expertise_city_municipality[$key],
        //         'country' => $expertise_country[$key],
        //         'start_date' => $expertise_start_date[$key],
        //         'end_date' => $expertise_end_date[$key],
        //         'status' =>3,
        //      ]);
        // }
        /* End Prior Experience */

        return redirect()->back()->with('update_success', 'Data Updated successfully.');
    }
    
} 