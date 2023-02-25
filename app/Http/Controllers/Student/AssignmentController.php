<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentCommunications;
use App\Models\Students;
use App\Models\AssignmentDetails;
use App\Models\AssignmentComment;
use App\Models\TrainerAllocation;
use DB;

class AssignmentController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('permission:student_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }
    
    public function assignment(){
        $user_id = Session::get('user_id');
        $student = Students:: where('user_id',$user_id)->first()->toArray();

        $ass_detail = AssignmentDetails::where('student_id',$user_id)->where('read_status',1)->where('comment_status',1)->get()->toArray();

        $complete =array();
        if(!empty($ass_detail)){
            foreach($ass_detail as $ass){
                array_push($complete,$ass['assignment_id']);
            }
        }
        
        $finish_assignment = StudentCommunications::with(['assignmentfiles','assinmentdetails'])->where('grade_id',$student['grade_id'])->where('school_id',$student['school_id'])->whereIn('id',$complete)->get()->toArray();
        

        $assignments = StudentCommunications::with(['assignmentfiles','assinmentdetails'])->where('grade_id',$student['grade_id'])->where('school_id',$student['school_id'])->whereNotIn('id',$complete)->get()->toArray();
       
        return view('student.assignment.assignment_view')->with('assignments',$assignments)->with('student',$student)->with('finish_assignment',$finish_assignment);
    }
    
    public function save_read_assignment(Request $request){
        $read = $request->read;
        $student_id = $request->student_id;
        $assignment_id = $request->assignment_id;

        $check_assignment = AssignmentDetails::where('student_id',$student_id)->where('assignment_id',$assignment_id)->first();
        if(!empty($check_assignment)){
            $check_assignment->read_status= $read;
            $check_assignment->save();
        }else{
        $ass_detail= new AssignmentDetails;
        $ass_detail->student_id= $student_id;
        $ass_detail->assignment_id= $assignment_id;
        $ass_detail->read_status= $read;
        $ass_detail->save();
        }
        echo 1;

    }
    public function save_comment_assignment(Request $request){
        $comment = $request->comment;
        $student_id = $request->student_id;
        $assignment_id = $request->assignment_id;

        $check_assignment = AssignmentDetails::where('student_id',$student_id)->where('assignment_id',$assignment_id)->first();
        if(!empty($check_assignment)){
            $check_assignment->comment_status= $comment;
            $check_assignment->save();
        }else{
            $ass_detail= new AssignmentDetails;
            $ass_detail->student_id= $student_id;
            $ass_detail->assignment_id= $assignment_id;
            $ass_detail->comment_status= $comment;
            $ass_detail->save();
        }
        
        echo 1;

    }

    public function getComment(Request $request){
        $data['student'] = Students::where('user_id',Session::get('user_id'))->first()->toArray();
        $trainer = TrainerAllocation::with('trainer')->where('school_id',$data['student']['school_id'])->first()->toArray();
        $data['trainer'] = $trainer['trainer'][0];
        $assignment_id = $request->assignment_id;
       
        $data['getMessage'] = AssignmentComment::with(['getAssignment'])->where('assignment_id',$assignment_id)->where('reciever_id',$data['student']['id'])->orWhere('sender_id',$data['student']['id'])->get()->toArray();
        
        
        echo json_encode($data);
    }

    public function addComment(Request $request){
       $assignment_id = $request->assignment_id;
       $trainer_id = $request->trainer_id;
       $student_id = $request->student_id;
       $comment = $request->comment;

       $assignment_comment = new AssignmentComment;
       $assignment_comment->assignment_id= $assignment_id;
       $assignment_comment->reciever_id= $trainer_id;
       $assignment_comment->sender_id= $student_id;
       $assignment_comment->message= $comment;
       $assignment_comment->save();

       $comment_id = DB::getPdo()->lastInsertId();
       $comment = AssignmentComment::with('student')->where('id',$comment_id)->first()->toArray();
       
       echo json_encode($comment);

    }
}