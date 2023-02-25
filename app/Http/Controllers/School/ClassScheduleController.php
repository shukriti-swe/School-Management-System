<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\AllocationEvent;
use App\Models\TrainerAllocation;
use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    public function class_schedule()
    {  
      return view('school.class_schedule.schedule');
    }

    public function school_classSchedule()
    {
      $userId = Session::get('user_id');
         
      $schoolId = School::where('user_id', $userId)->first();

      $trainer=TrainerAllocation::with('trainer')->where('school_id',$schoolId->id)->get()->toArray();
      
      if($trainer)
      {
          $Trainer_name = [];
          foreach($trainer as $key=>$trainers)
          {
    
            $Trainer_name[]=['id'=>$trainers['id'],'title'=>'Trainer Name: '.$trainers['trainer'][0]['trainer_name'].' Grade: '.$trainers['grade'],'daysOfWeek'=>[$trainers['day']],'startTime'=>$trainers['class_start'],'endTime'=>$trainers['class_end'],'color'=>'purple'];
            
          }
        // $grade=[];  
        // foreach($trainer as $key=>$trainers)
        //   {
        //     if($trainers['grade'])
        //     {
        //         $grade[]=['id'=>$trainers['id'],'title'=>'Grade: '.$trainers['grade'],'daysOfWeek'=>[$trainers['day']],'color'=>'purple'];       
        //     }
         
        //   }
        // $Trainer_name=array_merge($Trainer_name,$grade);
      }

      //Class Schedule------------------
      $class_schedule=School::with('ClassSchedule')->find($schoolId->id)->toArray();
     
      $events = [];
      if($class_schedule)
      {
        $today_date = Carbon::now()->format('Y-m-d');
      
        foreach($class_schedule['class_schedule'] as $schedules)
        {

          $events[]=['title'=>'Class Time','daysOfWeek'=>[$schedules['day']],'startTime'=>$schedules['start_time'],'endTime'=>$schedules['end_time'],'color'=>'purple'];         
        }

        $school_event=AllocationEvent::where('school_id',$schoolId->id)->get()->toArray();
  
        if($school_event)
        {
          foreach($school_event as $key=>$school_events)
          {
            $events_new[]=['title'=>$school_events['event_name'],'start'=>$school_events['event_date'],'color'=>$school_events['event_color']];
        
          }
          $new_array_events=array_merge($events,$events_new);
          if($trainer)
          {
            $new_array_events=array_merge($new_array_events,$Trainer_name);
           
          }
        
          echo json_encode($new_array_events);
        }
        else
        {
          echo json_encode($events);
        }
      
     }
     else
     {
      echo json_encode($events);
     }
      
     
    }

    public function day_class_schedule(Request $req)
    {
      $day=$req->day;
      $userId = Session::get('user_id');
         
      $schoolId = School::where('user_id', $userId)->first();

      $trainer=TrainerAllocation::with('trainer')->where('school_id',$schoolId->id)->where('day',$day)->get()->toArray();
    
      $events=[];
      if($trainer)
      {
        foreach($trainer as  $trainers)
        {     
          $events[]='<b>Trainer Name:</b> '.$trainers['trainer'][0]['trainer_name'].', <b>Class Schedule:</b> '.$trainers['class_schedule'].'<br>';
        }
      //   echo '<pre>';
      // print_r($events);die();
        echo json_encode($events);
      }
      else
      {
        echo json_encode($events);
      }
 

    }
}
