<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\StudentCommunications;
use App\Models\AssingmentFiles;
use App\Models\Grade;

class ProgressreportController extends Controller
{
    public function progressReport(){

        $grades = Grade::get()->toArray();
        $students = Students::with(['user','getassignments', 'assignmentfiles'])->where('grade_id',1)->get();

        // $assignment = StudentCommunications::with('assignment')->get();
        
        return view('school.progres_report.list_progress', ['students' => $students,'grades'=>$grades]);
    }

    public function studentInfo(Request $request){
        
        $id = $request->studentId;
        $students = Students::with(['user', 'getassignments', 'assignmentfiles', 'getproject', 'projectfiles'])->find($id);
        echo json_encode($students);
        // dd($students);
        // echo '<pre>'; print_r($info); die();
    }

    public function getProgressByGrade(Request $request){
        
        $grade_id = $request->grade_id;
        $students = Students::with(['user','getassignments', 'assignmentfiles'])->where('grade_id',$grade_id)->get()->toArray();
        echo json_encode($students);
    }
}