<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Projectfiles;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Session;
use App\Models\Students;

class StudentProjectController extends Controller
{
    public function index(){
        $student = Students::where('user_id', Session::get('user_id'))->first();
        $studentId = $student->id;

        $projects = Project::with('project')->where('student_id',$studentId)->get();
        // dd($projects);
        return view('student.project.project_list', [
            'projects' => $projects,
        ]);
    }

    public function addProject(){
        $student = Students::where('user_id', Session::get('user_id'))->first();
        $studentId = $student->id;
        return view('student.project.project_add', [
            'student_id' => $studentId
        ]);
    }

    public function saveProject(Request $request){
        $project = new Project();
        $project->title = $request->title;
        $project->student_id = $request->student_id;
        $project->description = $request->description;
        $project->save();

        $attachments = $request->file('attachment');
        foreach ($attachments as $file) {
            $fileType = $file->getClientOriginalExtension();
            $fileName = 'project_'.Str::random(10).'.'.$fileType;
            $file->move('image/project/',$fileName);
            $imageUrl = 'image/project/'. $fileName;

            $projectfiles = new Projectfiles();
            $projectfiles->project_id = $project->id;
            $projectfiles->student_id = $request->student_id;
            $projectfiles->attachment = $imageUrl;
            $projectfiles->save();
        }

        return redirect('/student/project/list')->with('message', 'Project Added Successfully!');
    }

    public function editProject($id){
        $project = Project::with('project')->where('id',$id)->get()->toArray();
        $student = Students::where('user_id', Session::get('user_id'))->first();
        $studentId = $student->id;


        return view('student.project.project_edit', [
            'project' => $project,
            'student_id' => $studentId
        ]);
    }

    public function updateProject(Request $request){
        $project = Project::find($request->id);
        $project->title = $request->title;
        $project->student_id = $request->student_id;
        $project->description = $request->description;
        $project->save();

        // echo "<pre>";print_r($request->old_image); die();

        $attachments = $request->file('attachment');
        if(isset($attachments) && $attachments != ''){
            foreach ($attachments as $file) {
                $fileType = $file->getClientOriginalExtension();
                $fileName = 'project_'.Str::random(10).'.'.$fileType;
                $file->move('image/project/',$fileName);
                $imageUrl = 'image/project/'. $fileName;

                $projectfiles = new Projectfiles();
                $projectfiles->project_id = $project->id;
                $projectfiles->student_id = $request->student_id;
                $projectfiles->attachment = $imageUrl;
                $projectfiles->save();
            }
        }else{
                // echo 11; die();
            Projectfiles::where('project_id', $request->id)->delete();

            if(isset($request->old_image) && $request->old_image != ''){
                foreach($request->old_image as $oldimage){
                    
                    // if(File::exists($oldimage)){
                    //     unlink($oldimage);
                    // }

                    $projectfiles = new Projectfiles();
                    $projectfiles->project_id = $project->id;
                    $projectfiles->student_id = $request->student_id;
                    $projectfiles->attachment = $oldimage;
                    $projectfiles->save();
                    
                    // echo "<pre>";print_r($projectfiles); die();
                }
            }
        }


        return redirect('/student/project/list')->with('message', 'Project Added Successfully!');
    }

    public function viewProject($id){
          $project = Project::with('project')->where('id',$id)->get()->toArray();
        // dd($project);

        return view('student.project.project_view', [
            'project' => $project
        ]);
    }
}
