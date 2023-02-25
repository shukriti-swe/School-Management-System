<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;  
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\ClassSchedule;
use App\Models\AllocationEvent;
use App\Models\TrainerAllocation;

class ClassScheduleController extends Controller 
{
    public function Class_schedule()
    {
       return view('student.class_schedule.schedule');
    }

    public function student_classSchedule()
    {
        $userId = Session::get('user_id');
         
        $student = Students::where('user_id', $userId)->first();

        $class_schedule=ClassSchedule::where('school_id',$student->school_id)->get()->toArray();

        $events = [];
        if($class_schedule)
        {
            foreach($class_schedule as $class_schedules)
            {  
                $events[]=['title'=>'Class Time','daysOfWeek'=>[$class_schedules['day']],'startTime'=>$class_schedules['start_time'],'endTime'=>$class_schedules['end_time'],'color'=>'purple'];
            //$events[]=['title'=>'Class Time','start'=>$trainer_schedules->class_date];
            
            }
            $school_event=AllocationEvent::where('school_id',$student->school_id)->get()->toArray();
  
            if($school_event)
            {
              foreach($school_event as $key=>$school_events)
              {
                $events_new[]=['title'=>$school_events['event_name'],'start'=>$school_events['event_date'],'color'=>'purple'];
             
              }
              $new_array_events=array_merge($events,$events_new);
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
        
        // echo '<pre>';
        // print_r($events);die();
    
    }

    public function student_day_class_schedule(Request $req)
    {
      $day=$req->day;
      $userId = Session::get('user_id');
         
      $student = Students::where('user_id', $userId)->first();

      //$class_schedule=TrainerAllocation::with('trainer','getMetingUrl')->where('school_id',$student->school_id)->where('day',$day)->get()->toArray();
      $class_schedule='';  
     
        $events=[];
        if($class_schedule)
        {
            // foreach($class_schedule as  $class_schedules)
            // {     
            //   $events[]='<b>Trainer Name:</b> '.$class_schedules['trainer'][0]['trainer_name'].', <b>Class Schedule:</b> '.$class_schedules['class_schedule'].', <b>Join Url:</b> '.$class_schedules['get_meting_url'][0]['join_url'].', <b>Password</b> :'.$class_schedules['get_meting_url'][0]['password'].'<br><br>';
            
            // }
            // echo '<pre>';
            // print_r($events);
            // die();
            echo json_encode($events);
        }
        else
        {
            $class_schedule=ClassSchedule::where('school_id',$student->school_id)->where('day',$day)->get();
            foreach($class_schedule as $class_schedules)
            {  
                $events[]='<b>Classs Time:</b> '.$class_schedules['start_time'].'-'.$class_schedules['end_time'].'<br><b>Trainer Name:</b><br><b>Class Schedule:</b><br><b>Join Url:</b><br> <b>Password:</b><br><br>';
            //$events[]=['title'=>'Class Time','start'=>$trainer_schedules->class_date];
            
            }
            echo json_encode($events);
        }

    }
}
