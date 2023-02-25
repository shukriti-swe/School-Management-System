<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\AssignmentDetails;
use App\Models\StudentCommunications;
use App\Models\StudentFeedback;
use Illuminate\Support\Facades\DB;
use Hash;
use Image;

class StudentAccountController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('permission:student_edit');
        //$this->middleware('role:admin|writer')->only('testmiddleware');

        $this->module_name = 'users';
    }
    
    public function index(){

        $userId = Session::get('user_id');
        $student = Students:: where('user_id',$userId)->first()->toArray();
        $ass_detail = AssignmentDetails::where('student_id',$userId)->where('read_status',1)->where('comment_status',1)->get()->toArray();
        $complete =array();
        if(!empty($ass_detail)){
            foreach($ass_detail as $ass){
                array_push($complete,$ass['assignment_id']);
            }
        }
        $comments = StudentCommunications::with(['assignmentfiles','assinmentdetails'])
                                            ->where('grade_id',$student['grade_id'])
                                            ->where('school_id',$student['school_id'])
                                            ->whereNotIn('id',$complete)
                                            ->orderBy('id', 'DESC')
                                            ->limit(2)
                                            ->get()
                                            ->toArray();
        $student = Students::with(['school','user','getassignments', 'assignmentfiles'])
                                ->where('user_id', $userId)
                                ->get()
                                ->first();

        $today = date('Y-m-d');
        $beforeThreeMonths = date('Y-m-d', strtotime($today. '- 90 days'));
        
        // 2022-02-01 < 2022-04-06

        $feedbacks = StudentFeedback::where('student_id', Session::get('student_id'))
                                    ->where('created_at','<', $beforeThreeMonths)
                                    ->get();

        // dd($feedback);


        return view('student.index', [
            'student' => $student,
            'comments' => $comments,
            'feedbacks' => $feedbacks,
        ]);
    }

    public function studentProfile(){
        
        $student = Students::with([
            'school',
            'stdUser'
        ])
        ->find(Session::get('student_id'))
        ->toArray();

        // dd($student);

        return view('student.profile.student_edit', [
            'student' => $student,
        ]);
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

        return redirect('/student/profile/')->with('message', 'Student successfully Updated!');
    }
}
