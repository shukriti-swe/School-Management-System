<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentCommunications;
use App\Models\Students;
use App\Models\AssignmentDetails;
use App\Models\EventRagistration;
use App\Models\Event;
use Validator;

class EventController extends Controller
{
    public function eventList(){
        $events = Event::get()->toArray();
        return view('student.event.event_list')->with('events',$events);
    }

    public function eventView($id){
        $event = Event::where('id',$id)->get()->toArray();
         //echo "<pre>";print_r($event);die();
        return view('student.event.event_view')->with('event',$event[0]);
    }

    public function eventBookingRegistration(Request $request){

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required',
            'person' => 'required',
            'date' => 'required',
            'position' => 'required',
            'booking_agree' => 'required',
        ]);

        if ($validator->fails())
        {
     
          return response()->json(['error'=>$validator->errors()]);
        }
        $event_id = $request->event_id;
        $student_id = Session::get('user_id');
        $name = $request->full_name;
        $email = $request->email;
        $person = $request->person;
        $date = $request->date;
        $position = $request->position;
        $booking_agree = $request->booking_agree;

        $check_reg = EventRagistration::where('event_id',$event_id)->where('student_id',$student_id)->first();
        if(empty($check_reg)){

        $event = new EventRagistration();
        $event->event_id = $event_id;
        $event->student_id = $student_id;
        $event->name = $name;
        $event->email = $email;
        $event->person = $person;
        $event->date = $date;
        $event->position = $position;
        $event->booking_agree = $booking_agree;
        $event->save();
        echo 1;
        }else{
        echo 2;
        }


       
        
    }

}