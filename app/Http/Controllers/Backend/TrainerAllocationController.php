<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Trainer;
use App\Models\School;
use App\Models\TrainerAllocation;
use App\Models\AllocationEvent;
use App\Models\ClassSchedule;
use App\Models\NotificationInfo;
Use \Carbon\Carbon;
use DB;

class TrainerAllocationController extends Controller
{
    public function trainerallocation()
    {
        $all_city= Trainer::all()->unique('city');
     
       $all_school=School::all();
       return view('backend.trainer_allocation.trainer_allocation',compact('all_city','all_school'));
    }

    public function alltainer(Request $req)
    {   
        $city_id=$req->city_id;
        $mood_id=$req->mood_id;
        
        if($mood_id == '1')
        {
            $all_trainer=Trainer::where('city',$city_id)
            ->Where('mode',$mood_id)
            ->orWhere('mode',3)
            ->get()->toArray();
        }
        if($mood_id == '2')
        {
            $all_trainer=Trainer::where('city',$city_id)
            ->Where('mode',$mood_id)
            ->orWhere('mode',3)
            ->get()->toArray();
         
        }
        // if($mood_id == '3')
        // {
        //     $codeArray=[1,2];   
        //     $all_trainer=Trainer::whereIn('mode',$codeArray)
        //     ->where('city',$city_id)
        //     ->get()->toArray();

        // }
        


        // echo '<pre>';
        // print_r($all_trainer);
        // //dd($all_trainer);
        echo json_encode($all_trainer);
    }

    public function trainer_schedule_show(Request $req)
    {
   
      $school_id=$req->school_id;
        if($school_id == '0')
        {
     
          $new_array_events = [];
          echo json_encode($new_array_events);
      
        }
        else
        {

          $class_schedule=TrainerAllocation::with('trainer')->where('school_id',$school_id)->get()->toArray();
 
          //$class_schedule=School::with('ClassSchedule')->find($school_id)->toArray();
          
          // $date=date('Y-m-d',strtotime($school_row['created_at']));
          // $school_weekly=$school_row['class_schedule'];

     

          $events = [];
          foreach($class_schedule as $key=>$schedules)
          {
    

          //   $start_time= $schedules['class_date'].'T'.$schedules['class_start'];
          //   $end_time= $schedules['class_date'].'T'.$schedules['class_end'];
          //   $events[]=['title'=>'Trainer Name: '.$schedules['trainer'][0]['trainer_name'],'start'=>$start_time,'end'=>$end_time,'color'=>'purple'];
            $events[]=['id'=>$schedules['id'],'title'=>'Trainer Name: '.$schedules['trainer'][0]['trainer_name'],'daysOfWeek'=>[$schedules['day']],'startTime'=>$schedules['class_start'],'endTime'=>$schedules['class_end'],'description'=>'Trainer Name: '.$schedules['trainer'][0]['trainer_name'],'color'=>'purple'];
            
          }

          $school_event=AllocationEvent::where('school_id',$school_id)->get()->toArray();
  
          if($school_event)
          {
            foreach($school_event as $key=>$school_events)
            {
              $events_new[]=['ids'=>$school_events['id'],'title'=>$school_events['event_name'],'start'=>$school_events['event_date'],'color'=>$school_events['event_color']];
           
            }
            $new_array_events=array_merge($events,$events_new);
            echo json_encode($new_array_events);
          }
          else
          {
            echo json_encode($events);
          }
         
        
        }
        //echo '<pre>';print_r($new_array_events);die();      
        // echo '<pre>';
        // print_r($events_new);die();
         
    }

    public function assigntrainer(Request $req)
    {
   
     //    echo $req->event_date; die(); 
        //$date=date('Y-m',strtotime($req->event_date));
      $trainer_assign=TrainerAllocation::where('school_id',$req->school_id)->where('day',$req->day)->where('class_schedule',$req->class_schedule)->get()->toArray();
      if($trainer_assign)
      {
        $response = [
          'trainer_exist' => 'This Schedule Trainer Already Exits',
          ];
     
          return json_encode($response); 
      }
     $date = Carbon::parse($req->event_date);

     $weekNumber = $date->weekNumberInMonth;
     $start = $date->startOfWeek()->toDateString();
     $end = $date->endOfWeek()->toDateString();
     
     if($req->class_schedule)
     {
       $first_explode=explode('(',$req->class_schedule);

       $secoond_explode=explode(')',$first_explode[1]);

       $third_explode=explode('-',$secoond_explode[0]);


       $hourdiff = round((strtotime($third_explode[0]) - strtotime($third_explode[1]))/3600, 1);
     }

     //For Grade insert--------------
     if($first_explode[0])
     {
        $grade=explode(':',$first_explode[0]);
     }

     //echo abs($hourdiff);die();
     $weekly_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date','>=',$start)->where('class_date','<=',$end)->sum('class_duration');
     $weekly_hour_new=$weekly_hour+abs($hourdiff);
     
     $today_tainer_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date',$req->event_date)->sum('class_duration');      
     $today_tainer_hour_new=$today_tainer_hour+abs($hourdiff);
 
     if(($weekly_hour_new > 16 )||($today_tainer_hour_new > 4))
     {
        $response = [
          'today_tainer_hour' => 4,
          'trainer_id'=>$req->trainer_id    
          ];
     
          return json_encode($response); 
     }

     $TrainerAllocation=new TrainerAllocation();
     $TrainerAllocation->class_schedule=$req->class_schedule;
     $TrainerAllocation->school_id=$req->school_id;
     $TrainerAllocation->trainer_id=$req->trainer_id;
     $TrainerAllocation->class_date=$req->event_date;
     $TrainerAllocation->day=$req->day;
     $TrainerAllocation->grade=$grade[1];
     $TrainerAllocation->class_start=$third_explode[0];
     $TrainerAllocation->class_end=$third_explode[1];   
     $TrainerAllocation->class_duration=abs($hourdiff);
     ///echo $req->day;
     //echo $req->class_schedule;
       

        $success=$TrainerAllocation->save();

        /* Email send to school and trainer */

               //School Email--------------
              //  $one_school=School::where('id',$req->school_id)->get('official_email_id')->toArray();
              //  $school_email=$one_school['0']['official_email_id'];

              
              //  $email_body="New Trainer Assign";
       
              //  file_put_contents('../resources/views/mail.blade.php',$email_body);
              //  $data = array('email'=>$school_email,'subject'=>"Trainer Assign");
       
             
              //  $send_mail=Mail::send('mail', $data, function($message) use ($data){
              //      $message->to($data['email'], 'kidsinterpreneurship')->subject
              //         ($data['subject']);
              //   });

              //School Notification-------------------
              $notificationinfo = new NotificationInfo();
              $notificationinfo->school_id =0;
              $notificationinfo->grade_id = 0;
              $notificationinfo->receiver_id = $req->school_id;
              $notificationinfo->receiver_status = 1;
              $notificationinfo->title = "New Trainer Allocate";
              $notificationinfo->description ="New trainer assign ".$req->trainer_name.'.Class Schedule at'.$third_explode[0].' to '.$third_explode[01];
              $notificationinfo->creator_id =1;
              $notificationinfo->save();
                
               //Trainer Email--------------
              //  $one_trainer=Trainer::where('id',$req->trainer_id)->get('official_email_id')->toArray();
              //  $trainer_email=$one_trainer['0']['official_email_id'];
    
              
              //  $email_body="New Trainer Assign";
       
              //  file_put_contents('../resources/views/mail.blade.php',$email_body);
              //  $data = array('email'=>$trainer_email,'subject'=>"Trainer Assign");
       
             
              //  $send_mail=Mail::send('mail', $data, function($message) use ($data){
              //      $message->to($data['email'], 'kidsinterpreneurship')->subject
              //         ($data['subject']);
              //   });
               
              //Trainer Notification------------------
              $notificationinfo_new = new NotificationInfo();
              $school_name=School::where('id',$req->school_id)->first()->toArray();
              $notificationinfo_new->school_id =0;
              $notificationinfo_new->grade_id = 0;
              $notificationinfo_new->receiver_id = $req->trainer_id;
              $notificationinfo_new->receiver_status = 2;
              $notificationinfo_new->title = "New Trainer Allocate";
              $notificationinfo_new->description ="You have assisgn this ".$school_name['school_name'].'.Your Class Schedule at'.$third_explode[0].' to '.$third_explode[01];
              $notificationinfo_new->creator_id =1;
              $notificationinfo_new->save(); 
        /* End Email Send section */

        $after_weekly_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date','>=',$start)->where('class_date','<=',$end)->sum('class_duration');

        $after_today_tainer_hour=TrainerAllocation::where('trainer_id',$req->trainer_id)->where('class_date',$req->event_date)->sum('class_duration');

        if(($after_weekly_hour > 16 )||($after_today_tainer_hour > 4))
        {
          $response = [
               'success' => 4,
               'trainer_id'=>$req->trainer_id    
           ];
          
           return json_encode($response);  
        } 

        if($success)
        {
          $response = [
               'success' => true,
               'message'=>'successfully Inserted!'
           ];
          
           return json_encode($response);  
        }
        
    }

    public function event_insert(Request $req)
    {
          $event=new AllocationEvent();
          $event->school_id=$req->school_id;
          $event->event_name=$req->event_name;
          $event->event_date=$req->event_date;
              $event->event_color=$req->event_color;
          $event->save();
    }

    public function trainer_class_schedule(Request $req)
    {
       $school_id=$req->school_id;
       $day=$req->day;

       $full_schedule=ClassSchedule::where('school_id',$school_id)->get()->toArray();
      //  echo '<pre>';
      //  print_r($full_schedule);die();
       $class_check=ClassSchedule::where('school_id',$school_id)->where('day',$day)->get()->toArray();
       
       if($class_check)
       {
          
         $events = [];
        foreach($class_check as $schedules)
        {

          $events[]=['title'=>'class time:grade'.$schedules['grade'].'('.$schedules['start_time'].'-'.$schedules['end_time'].')'];
          
        } 
         return json_encode($events); 
       }
       else
       {
          foreach($full_schedule as $full_schedules)
          {
              if($full_schedules['day'] == '6')
              {
                   $day='Saturday';
              }
              if($full_schedules['day'] == '0')
              {
                   $day='Sunday';
              }
              if($full_schedules['day'] == '1')
              {
                   $day='Monday';
              }
              if($full_schedules['day'] == '2')
              {
                   $day='Tuesday';
              }
              if($full_schedules['day'] == '3')
              {
                   $day='Wednesday';
              }
              if($full_schedules['day'] == '4')
              {
                   $day='Thursday';
              }
              if($full_schedules['day'] == '5')
              {
                   $day='Friday';
              }
              $class_schedlue[]=['title'=>'class time: Grade-'.$full_schedules['grade'].' Day-'.$day.'('.$full_schedules['start_time'].'-'.$full_schedules['end_time'].')'];

          }
          // for($i=0; $i<count($school_weekly); $i++){
         
          //     $events[]=['title'=>$day.' ('.$school_weekly[$i]['start_time'].'-'.$school_weekly[$i]['end_time'].')','start'=>$date];
            
          // }
          $response = [
            'no_schedule' =>'This day school has no class',
            'class_schedlue'=>$class_schedlue
          ];
          return json_encode($response); 
       }


    }

    public function assigntrainer_delete(Request $req)
    {
       $trainer_id=$req->trainer_assign_id;
       $custom_event_id=$req->custom_event_id;
      if($trainer_id)
      {
        TrainerAllocation::where('id',$trainer_id)->delete();
      }
      if($custom_event_id)
      {
        AllocationEvent::where('id',$custom_event_id)->delete();
      }

       echo json_encode('suceessfully deleted');
    }
}
