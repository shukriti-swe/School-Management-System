<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Grade;
use App\Models\Students;
use App\Models\Project;
use App\Models\StudentFeedback;
use App\Models\Trainer;
use App\Models\TrainerAllocation;
use App\Models\StudentAttendance;
use DB;
use Datatables;
use Validator;

class StudentController extends Controller
{
    public function student_list()
    {
        $userId = Session::get('user_id');
        $trainer=Trainer::where('user_id', $userId)->first();

        // echo '<pre>';
        // print_r();die();
        $get_schools=TrainerAllocation::where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();
        if(!empty($get_schools)){
            $school_ids=[];
           foreach($get_schools as $school){
             $school_ids[]= $school['school_id'];
           }
        }

        $school=School::whereIn('id',$school_ids)->get()->toArray();
        $grade=Grade::all()->toArray();

        //dd($students);

        // echo '<pre>';
        // print_r($students);die();

        return view('trainer.student.student_list',compact('school','grade'));
    }

    public function student_list_datatable(Request $request)
    {
    
        $userId = Session::get('user_id');
        $trainer=Trainer::where('user_id', $userId)->first();

        // echo '<pre>';
        // print_r();die();
        $get_schools=TrainerAllocation::where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();
        if(!empty($get_schools)){
            $school_ids=[];
           foreach($get_schools as $school){
             $school_ids[]= $school['school_id'];
           }
        }

        if(($request->school_id != '') && ($request->grade_id != ''))
        {
            $data = Students::with([
                'school' => function ($query) {
                    $query->select('id','school_name');
                },
                'stdUser','assignmentfiles','projectfiles','getproject'
            ])
            ->where('school_id', $request->school_id)
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
            ->whereIn('school_id',$school_ids)
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
                $actionbtn='<a href="'.route('trainer.student_view',$row['id']).'" class="btn btn-block btn-info btn-sm"><i class="fas fa-eye"></i></a>';

               return $actionbtn; 	

            })
            // ->addColumn('assignment', function($row) {
            //     //echo '<pre>';
            //     //print_r($row['assignmentfiles']);
            //      $html='';
            //     foreach($row['assignmentfiles'] as $assignments)
            //     {
            //          //$assignment=$assignments['attachment'];
            //          $html .='<a href="{{asset($assignment)}}" target="_blank" class="btn btn-sm btn-warning m-2">
            //          <i class="fas fa-file-pdf"></i>
            //         </a>';
                   
            //     }
            //     return $html;
            // })
            // ->addColumn('projects', function($row) {
              
            //      $html='';
            //      $i=1;
            //     foreach($row['getproject'] as $key=>$projects)
            //     {
            //         // $url=asset("$projectfiles[attachment]"); 
            //         //  $html .='<a href="'.$url.'" target="_blank" class="btn btn-sm btn-warning m-2">
            //         //  <i class="fas fa-file-pdf"></i>
            //         // </a>';
            //         $html.=$i.'. '.$projects['title'].'<br>';
            //         $i++;
            //     }
            //     return $html;
            // })
        //     ->addColumn('projects_status', function($row) {
        //         // $project=$row['getproject'];
        //         // echo '<pre>';
        //         // print_r($project);
               
        //         $approve_reject='<a href="javascript::void" title="Approve" data-target="" data-id="'.$row['id'].'" id="approve_project" data-toggle="modal" class="btn btn-primary btn-xs add-tooltip" data-placement="top" title="" data-original-title="Approve"><i class="fa fa-check"></i></a>
        //         <a href="javascript::void" title="Reject" data-id="'.$row['id'].'" id="reject_project" data-toggle="modal" class="btn btn-danger btn-xs add-tooltip" data-placement="top" title="" data-original-title="Reject"><i class="fa fa-ban"></i></a>';

        //        return $approve_reject;
        //    })

            ->rawColumns(['action'])
            ->make(true);
        }


    }

    public function student_view($id)
    {
        $students = Students::get()->toArray();

        $one_student=Students::find($id)->toArray();
        // echo '<pre>';
        // print_r($one_student);
        // die();
        return view('trainer.student.student_view',compact('students','one_student'));
    }

    public function student_feedback(Request $req)
    {
        $student_id=$req->studentId;
        $assesment=StudentFeedback::where('student_id',$student_id)->first();
        // echo '<pre>';
        // print_r($assesment);die();
        // if(!empty($assesment))
        // {
            return response()->json([
                'assesment'=>$assesment,
                'id'=>$student_id
            ]);
        // }
        // else
        // {
        //     return response()->json([
        //         'assesment'=>'',
        //         'id'=>$student_id
        //     ]);
        // }
    }

    public function student_feedback_submit(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'year' => 'required',
            'level' => 'required',
            'feedback' => 'required',
            'grade' => 'required',
        ]);

        if ($validator->fails())
        {
     
          return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
            $feedback_check=StudentFeedback::where('student_id',$req->student_id)->where('year',$req->year)->where('level',$req->level)->first();
            
            if($feedback_check)
            {
                return response()->json(['feedback_check'=>'Data Already exist']);  
            }
            else
            {
                // echo '<pre>';
                // print_r($_POST);
                // die();
                $student_feedback = new StudentFeedback(); 
                $student_feedback->student_id=$req->student_id;
                $student_feedback->level=$req->level;
                $student_feedback->year=$req->year;
                $student_feedback->feedback=$req->feedback;
                $student_feedback->grade=$req->grade;  
           
                if($req->assesment)
                {
                    $student_feedback->assessment=1;
                }
                else
                {
                    $student_feedback->assessment=0;
                }
           
                $student_feedback->save(); 
                
                return response()->json(['success'=>'Successfully Insert']);
            }
        }
    }

    // public function student_assesment(Request $req)
    // {
    //     $student_id=$req->student_id;

    //     if($req->action == 'checked')
    //     {
    //         $data['assessment']=1;
    //         StudentFeedback::where('student_id',$student_id)->update($data);
    //     }
    //     else
    //     {
    //         $data['assessment']=0;
    //         StudentFeedback::where('student_id',$student_id)->update($data);
    //     }
    //     return response()->json(['success'=>'Successfully updated']);
    // }

    public function project_approve(Request $req)
    {
       // echo $req->student_id;die();
        $student=Students::with([
            'getproject' => function ($query) {
                $query->where('project_status',0);
            },
        ])->find($req->student_id)->toArray();
        
       echo json_encode($student);

    }
    public function approve_project_submit(Request $req)
    {
        
        $student_id=$req->project_approve;

        if($student_id)
         {
            foreach($student_id as $students_id)
            {
                $data['project_status']=1;
                Project::where('id',$students_id)->update($data);
                
                return response()->json(['success'=>'Successfully update']);
            }
        } 
    }

    public function reject_project_submit(Request $req)
    {
       $student_id=$req->project_approve;
       if($student_id)
       {
          foreach($student_id as $students_id)
          {
              $data['project_status']=2;
              Project::where('id',$students_id)->update($data);
              
              return response()->json(['success'=>'Successfully update']);
          }
      } 
    }
    public function student_attendence()
    {
        $trainer = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        $schools = TrainerAllocation::with('getSchool')->where('trainer_id',$trainer['id'])->groupBy('school_id')->get()->toArray();
        $grades = Grade::get()->toArray();
        //echo "<pre>";print_r($schools);die();
        return view('trainer.student.student_attendence')->with('schools',$schools)->with('grades',$grades);
    }

    public function getStudent(Request $request){
        $school_id= $request->school_id;
        $grade_id= $request->grade_id;
        $data['students'] = Students::where('school_id',$school_id)->where('grade_id',$grade_id)->get()->toArray();
        $attendance = [];
        foreach($data['students'] as $student){
            $attendance[]= StudentAttendance::where('student_id',$student['id'])->get()->toArray();
        }
        $data['attendance']=$attendance;
        // echo "<pre>";print_r($attendance);die();
        echo json_encode($data);
    }

     public function saveAttendance(Request $request){
        $student_id= $request->student_id;
        $class_no= $request->class_no;
        $attend_status= $request->attend_status;
        $trainer = Trainer::where('user_id',Session::get('user_id'))->first()->toArray();
        $trainer_id = $trainer['id'];
        
        $check_attendance = StudentAttendance::where('student_id',$student_id)->where('trainer_id',$trainer_id)->where('class_no',$class_no)->get()->toarray();
 
        //echo "<pre>";print_r($check_attendance);die();
        if(empty($check_attendance)){
            $attendance = new StudentAttendance;
            $attendance->student_id= $student_id;
            $attendance->trainer_id= $trainer_id;
            $attendance->class_no= $class_no;
            $attendance->attend_status= $attend_status;
            $attendance->save();

            $attend_id = DB::getPdo()->lastInsertId();

            $data['attendance'] = StudentAttendance::where('id',$attend_id)->first()->toArray();
            $data['status'] = 1;
            echo json_encode($data);
        }else{
            $check_attendance = StudentAttendance::where('student_id',$student_id)->where('trainer_id',$trainer_id)->where('class_no',$class_no)->get();
            $check_attendance[0]->attend_status=$attend_status;
            $check_attendance[0]->save();
            $check_attendance = StudentAttendance::where('student_id',$student_id)->where('trainer_id',$trainer_id)->where('class_no',$class_no)->get()->toArray();
            $data['attendance'] = $check_attendance;
            $data['status'] = 2;
            echo json_encode($data);
        }
    }
}
