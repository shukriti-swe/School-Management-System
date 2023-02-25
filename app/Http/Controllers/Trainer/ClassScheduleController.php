<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use App\Models\TrainerAllocation;
use App\Models\Trainer;
use Carbon\Carbon;

class ClassScheduleController extends Controller
{
    public function classSchedule()  
    {
        return view('trainer.schedule.class_schedule');
    }
    public function trainer_classSchedule()
    {
        $userId = Session::get('user_id');
         
        $trainer=Trainer::where('user_id', $userId)->first();
        
        $trainer_schedule=TrainerAllocation::where('trainer_id',$trainer['id'])->get()->toArray();
 
         $events = [];
        if($trainer_schedule)
         {   
            foreach($trainer_schedule as $trainer_schedules)
            {  
            //$start_time= $trainer_schedules->class_date.'T'.$trainer_schedules->class_start;
            //$end_time= $trainer_schedules->class_date.'T'.$trainer_schedules->class_end;
            //$events[]=['title'=>'Class Time','start'=>$start_time,'end'=>$end_time,'color'=>'purple'];
            $events[]=['title'=>'Class Time','daysOfWeek'=>[$trainer_schedules['day']],'startTime'=>$trainer_schedules['class_start'],'endTime'=>$trainer_schedules['class_end'],'color'=>'purple'];
            
            }
            echo json_encode($events); 
        }
        else
        {
            echo json_encode($events); 
        }
        
        //echo '<pre>';
        //print_r($events);die();
       
        
    }

    public function trainer_day_class_schedule(Request $req)
    {
        $userId = Session::get('user_id'); 
        $trainer=Trainer::where('user_id', $userId)->first();
        $day=$req->day;
        
        //$trainer_schedule=TrainerAllocation::with('getSchool','getMetingUrl')->where('trainer_id',$trainer['id'])->where('day',$day)->get()->toArray();
        $trainer_schedule=TrainerAllocation::with('getSchool')->where('trainer_id',$trainer['id'])->where('day',$day)->get()->toArray();

        $events=[];
        if($trainer_schedule)
        {
            foreach($trainer_schedule as  $trainer_schedules)
            {     
              //$events[]='<b>School Name:</b> '.$trainer_schedules['get_school']['school_name'].', <b>Class Schedule:</b> '.$trainer_schedules['class_schedule'].', <b>Join Url:</b> '.$trainer_schedules['get_meting_url'][0]['join_url'].', <b>Password</b> :'.$trainer_schedules['get_meting_url'][0]['password'].'<br><br>';
              $events[]='<b>School Name:</b> '.$trainer_schedules['get_school']['school_name'].', <b>Class Schedule:</b> '.$trainer_schedules['class_schedule'].', <b>Join Url:</b> , <b>Password</b>: <br><br>';
            }
            echo json_encode($events);
        }
        else
        {
            echo json_encode($events);
        }

    }
}
