<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Grade;
use App\Models\Trainer;
use App\Models\User;
use App\Models\School;
use App\Models\StudentCommunications;
use App\Models\AssingmentFiles;
use App\Models\TrainerAllocation;
use App\Models\Students;
use App\Models\AssignmentComment;
use App\Models\AssignmentDetails;
use DB;

class AssignmentController extends Controller
{
    public function createAssignment()
    {
        $trainer = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        $get_schools = TrainerAllocation::where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();

        if(!empty($get_schools)){
            $school_ids=[];
           foreach($get_schools as $school){
             $school_ids[]= $school['school_id'];
           }
        }
        $schools = School::whereIn('id',$school_ids)->get()->toArray();
        $grades = Grade::get()->toArray();


        return view('trainer.assignment.create_assignment', [
            'schools' => $schools,
            'grades' => $grades,
        ]);
    }

    public function store_assignment(Request $request)
    {
        
        $validated = $request->validate([
            'assignment_title' => 'required',
            'school_id' => 'required',
            'grade_id' => 'required',
            'comment' => 'required',
        ]);

        $trainer = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
      
        $assignment = new StudentCommunications();
        $assignment->title = $request->assignment_title;
        $assignment->school_id = $request->school_id;
        $assignment->grade_id = $request->grade_id;
        $assignment->comment = $request->comment;
        $assignment->save();
        
        $multiAssignment = $request->multi_assignment;
        if($multiAssignment){

            for($i = 0; $i< count($multiAssignment); $i++){
                $assignmentFile = new AssingmentFiles();
                $assignmentFile->assignment_id = $assignment->id;
                $assignmentFile->attachment = $multiAssignment[$i];
                $assignmentFile->save();
            }

        }

        return redirect()->back()->with('message', 'Assignment Created Successfully!');
    }

    public function viewAssignment()
    {
        $trainer = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        $get_schools = TrainerAllocation::where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();

        if(!empty($get_schools)){
            $school_ids=[];
           foreach($get_schools as $school){
             $school_ids[]= $school['school_id'];
           }
        }
       $assignment=StudentCommunications::whereIn('school_id',$school_ids)->get()->toArray();
       $students = Students::whereIn('school_id',$school_ids)->get()->toArray();
       //echo "<pre>";print_r($assignment);die();
       return view('trainer.assignment.view_assignment',compact('assignment','students'));
    }

    public function createComment(Request $request){
        $tariner = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        $student_id = $request->student_id;
        $message = $request->message;
        $assignment_id = $request->assignment_id;

        $assignment_comment = new AssignmentComment;
        $assignment_comment->assignment_id = $assignment_id;
        $assignment_comment->reciever_id = $student_id;
        $assignment_comment->sender_id = $tariner['id'];
        $assignment_comment->message = $message;
        $assignment_comment->save();
        
        $comment_id = DB::getPdo()->lastInsertId();
        $comment = AssignmentComment::with('getTrainer')->where('id',$comment_id)->first()->toArray();

        echo json_encode($comment);
    }

    public function getStudentComment(Request $request){
         $student_id = $request->student_id;
         $assignment_id = $request->assignment_id;
         
        //  $data['getComment'] = AssignmentComment::with('getAssignment')->where('assignment_id',$assignment_id)->where('reciever_id',$student_id)->orWhere('sender_id',$student_id)->get()->toArray();

         $getComments= DB::select('select * from assignment_comment as ac inner join assignments as a on ac.assignment_id=a.id where ac.assignment_id='.$assignment_id.' AND (ac.reciever_id='.$student_id.' OR ac.sender_id='.$student_id.');');
         
         $data['getComment']= json_decode(json_encode($getComments), true);

        $assignmentCommnet = AssignmentDetails::where(['student_id' => $student_id, 'assignment_id' => $assignment_id])->get()->toArray();
        if(!empty($assignmentCommnet)){
            $data['assignmentCommnet'] = $assignmentCommnet[0];
        }else{
            $data['message'] = 'Not Found!!';
        }

         //echo "<pre>";print_r($data['getComments']);die();

         $data['student'] = Students::where('id',$student_id)->first()->toArray();
         $data['tariner'] = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        
         echo json_encode($data);

    }

    public function completeAssignment(Request $request)
    {
        $student_id = $request->student_id;
        $assignment_id = $request->assignment_id;

        $assignmentDetails = AssignmentDetails::where(['student_id' => $student_id, 'assignment_id' => $assignment_id])->first();
        $assignmentDetails->comment_status = $request->comment;
        $assignmentDetails->save();

        $result = 'success';
        echo json_encode($result);

        // echo "<pre>"; print_r($assignmentDetails); die();
    }

}
