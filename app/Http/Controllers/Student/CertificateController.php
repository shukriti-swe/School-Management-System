<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignmentDetails;
use App\Models\Project;
use App\Models\StudentFeedback;
use App\Models\StudentAttendance;
use Illuminate\Support\Facades\Session;
class CertificateController extends Controller
{
    public function studentCertificate(){
        $attendances = StudentAttendance::where('student_id',Session::get('student_id'))->get()->toArray();
        $totalClass = count($attendances);

        $attend = 0;
        foreach($attendances as $present){
            if($present['attend_status'] == 1){
                $attend = $attend + 1;
            }
        }

        $present = 0;
        if($attend > 0){
            $present = $attend / $totalClass * 100;
        }
        $attendance = $present;
        
        $assessment = StudentFeedback::where(['student_id' => Session::get('student_id'), 'assessment' => 1])->get();
        $project = Project::where('student_id',Session::get('student_id'))->get();
        $assignment = AssignmentDetails::where('student_id',Session::get('user_id'))->get()->first();

        // dd($assessment);

        return view('student.certificate.certificate', [
            'attendance' => $attendance,
            'assessment' => $assessment,
            'project' => $project,
            'assignment' => $assignment,
        ]);
    }
}
