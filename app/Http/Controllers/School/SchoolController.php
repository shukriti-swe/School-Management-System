<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\School;
use App\Models\Trainer;
use App\Models\TrainerAllocation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Grade;
use App\Models\StudentCommunications;
use App\Models\Project;
use Hash;
use Image;
use File;
use DB;

class SchoolController extends Controller
{
    public function studentList(){

        $userId = Session::get('user_id');
        $school=School::where('user_id', $userId)->first();

        $grades = Students::with(['getgrades'])->where('school_id',$school->id)->groupBy('grade_id')->get()->toArray();
        
        //dd($grades);
        
        return view('school.student.student_list',compact('grades'));
    }


     public function student_list_datatable(Request $request)
    {
        
        $userId = Session::get('user_id');
        // echo $userId;die();
        $school=School::where('user_id', $userId)->first();


        if($request->grade_id != '')
        {
            $data = Students::with([
                'school' => function ($query) {
                    $query->select('id','school_name');
                },
                'stdUser','assignmentfiles','projectfiles','getproject'
            ])
            ->where('school_id', $school->id)
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
            ->where('school_id',$school->id)
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
                 $actionbtn='<a href="'.route('school.student-edit', $row['id']).'"class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('school.student-delete', $row['id']).'"class="btn btn-block btn-danger btn-sm" id="deleteStudent"><i class="fas fa-trash"></i></a>
                ';
                return $actionbtn; 	

            })
            ->addColumn('assignment', function($row) {
                //echo '<pre>';
                //print_r($row['assignmentfiles']);
                 $html='';
                foreach($row['assignmentfiles'] as $assignments)
                {
                     //$assignment=$assignments['attachment'];
                     $html .='<a href="{{asset($assignment)}}" target="_blank" class="btn btn-sm btn-warning m-2">
                     <i class="fas fa-file-pdf"></i>
                    </a>';
                   
                }
                return $html;
            })
            ->addColumn('projects', function($row) {
              
                 $html='';
                 $i=1;
                foreach($row['getproject'] as $key=>$projects)
                {
                    // $url=asset("$projectfiles[attachment]"); 
                    //  $html .='<a href="'.$url.'" target="_blank" class="btn btn-sm btn-warning m-2">
                    //  <i class="fas fa-file-pdf"></i>
                    // </a>';
                    $html.=$i.'. '.$projects['title'].'<br>';
                    $i++;
                }
                return $html;
            })
        //     ->addColumn('projects_status', function($row) {
        //         // $project=$row['getproject'];
        //         // echo '<pre>';
        //         // print_r($project);
               
        //         $approve_reject='<a href="javascript::void" title="Approve" data-target="" data-id="'.$row['id'].'" id="approve_project" data-toggle="modal" class="btn btn-primary btn-xs add-tooltip" data-placement="top" title="" data-original-title="Approve"><i class="fa fa-check"></i></a>
        //         <a href="javascript::void" title="Reject" data-id="'.$row['id'].'" id="reject_project" data-toggle="modal" class="btn btn-danger btn-xs add-tooltip" data-placement="top" title="" data-original-title="Reject"><i class="fa fa-ban"></i></a>';

        //        return $approve_reject;
        //    })

            ->rawColumns(['action','assignment','projects','projects_status'])
            ->make(true);
        }
    }

    public function studentEdit($id){

        $student = Students::with([
            'school',
            'stdUser',
            'getassignments'
        ])
        ->find($id)
        ->toArray();
        
        //dd($student);

        $assignment = StudentCommunications::get();
        // echo "<pre>"; print_r($assignment); die();
        // $assignment = StudentCommunications::with('assignment')->get()->first();

        return view('school.student.student_edit', [
            'student' => $student,
            'assignment' => $assignment,
        ]);
    }

  public function studentDelete($id)
  {
      
        $data = Students::find($id);
       

        if ($data->image != '') {

            if (File::exists($data->image)) {
                unlink($data->image);
            }
        }
        //echo $data->user_id;die();
        //$user = User::where('id', $data->user_id)->first();
        DB::table('users')->where('id',$data->user_id)->delete();

        $success = Students::where('id', $id)->delete();

        if ($success) {
            $notification = array(
                'message1' => 'Student Successfully deleted!',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function studentUpdate(Request $request){
        $user = User::find($request->user_id);

        if(!empty($request->old_password)){
            if(Hash::check($request->old_password, $user->password)){
            if($request->confirm_password==$request->new_password){
                $user->password = Hash::make($request->new_password);
            }else{
                return redirect()->back()->with('confirm_password_faild',"Your new password and confirm password didn't match");
            }
            }else{
                return redirect()->back()->with('old_password_faild',"Your Old password Didn't match");
            }
        }

      
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->save();

        $request_image = $request->file('profile_image');

        if(!empty($request_image)){
            // $image_path = public_path('/image/student/');
            $image = Image::make($request_image);
            $directory = 'image/student/';
            $img_name = time().'.'.$request_image->getClientOriginalExtension();
            $imageUrl = $directory.$img_name;
            $image->save($imageUrl);

            $image_name = $directory."thumbnail/".$img_name;
            $image->resize(null, 200, function($constraint) {
                $constraint->aspectRatio();
            });
                
            $image->save($image_name);
        }else{
             
            $image_name = $request->pre_image;
      
        }


        $students = Students::find($request->student_id);
        $students->project = $request->project;
        $students->name = $request->name;
        $students->assignment = $request->assignment;
        $students->classes_held = $request->classes_held;
        $students->classes_attended = $request->classes_attended;
        $students->attendance = $request->attendance;
        $students->overal_grade = $request->overal_grade;
        $students->father_name = $request->father_name;
        $students->mother_name = $request->mother_name;
        $students->address = $request->address;
        $students->blood_group = $request->blood_group;
        $students->activity_incharge = $request->activity_incharge;
        $students->image = $image_name;
        $students->save();

        return redirect('/school/student/list')->with('message', 'Student successfully Updated!');

        // echo "<pre>"; print_r($students); die();


        // $student = Students::find($id)->toArray();
        // // echo "<pre>"; print_r($student); die();

        // // $schoolId = $school['id'];
        // // $students = Students::where('school_id', $schoolId)->get()->toArray();

        // return view('school.student.student_edit', [
        //     'student' => $student
        // ]);
    }
}
