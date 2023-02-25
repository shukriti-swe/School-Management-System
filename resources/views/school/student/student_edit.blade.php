@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item active">Edit Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session()->has('email_faild'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('email_faild') }}
            </div>
            @endif

            @if(session()->has('confirm_password_faild'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('confirm_password_faild') }}
            </div>
            @endif

            @if(session()->has('old_password_faild'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('old_password_faild') }}
            </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">

                        <form action="{{route('school.student-update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="student_id" value="{{$student['id']}}">
                            <input type="hidden" name="user_id" value="{{$student['std_user']['id']}}">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Student Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$student['std_user']['name']}}">
                                    @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Student Grade</label>
                                    <input type="text" class="form-control @error('grade_id') is-invalid @enderror" id="grade_id" name="grade_id" value="{{$student['grade_id']}}">
                                    @error('grade_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="project">Project</label>
                                    <input type="text" class="form-control @error('project') is-invalid @enderror" id="project" name="project" placeholder="" value="{{$student['project']}}">

                                    @error('project')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="assignment">Assignment</label>
                                    <input type="text" class="form-control @error('assignment') is-invalid @enderror" id="assignment" name="assignment" placeholder=""
                                    value="{{$student['assignment']}}">

                                    @error('assignment')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="classheld">Classes Held</label>
                                    <input type="text" class="form-control @error('classes_held') is-invalid @enderror" id="classheld" name="classes_held" placeholder="" value="{{$student['classes_held']}}">

                                    @error('classes_held')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="classattended">Classes Attended</label>
                                    <input type="text" class="form-control @error('classes_attended') is-invalid @enderror" id="classattended" name="classes_attended" placeholder="" value="{{$student['classes_attended']}}">

                                    @error('classes_attended')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="attendance">Attendance</label>
                                    <input type="text" class="form-control @error('attendance') is-invalid @enderror" id="attendance" name="attendance" placeholder="" value="{{$student['attendance']}}">

                                    @error('attendance')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="overal_grade">Overal Grade</label>
                                    <input type="text" class="form-control @error('overal_grade') is-invalid @enderror" id="overal_grade" name="overal_grade" placeholder="" value="{{$student['overal_grade']}}">

                                    @error('overal_grade')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="" value="{{$student['father_name']}}">

                                    @error('father_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" placeholder="" value="{{$student['mother_name']}}">

                                    @error('mother_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="activity_incharge">Activity Incharge</label>
                                    <input type="text" class="form-control @error('activity_incharge') is-invalid @enderror" id="activity_incharge" name="activity_incharge" placeholder="" value="{{$student['activity_incharge']}}">

                                    @error('activity_incharge')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                            </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="" value="{{$student['std_user']['email']}}">

                                @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mobile">Phone</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="" value="{{$student['std_user']['mobile']}}">

                                @error('mobile')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="" value="{{$student['address']}}">

                                @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" placeholder="" value="{{$student['blood_group']}}">

                                @error('blood_group')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date_of_brith">Date Of Brith</label>
                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" placeholder="" value="{{date('Y-m-d',strtotime($student['std_user']['date_of_birth']))}}">

                                @error('date_of_brith')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" placeholder="" value="{{$student['std_user']['gender']}}">

                                @error('gender')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputFile">Upload a image</label>
                            <div class="input-group">
                               <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="profile_image">
                                    <input type="text" name="pre_image" value="<?php if(!empty($student['std_user']['image'])){echo $student['std_user']['image'];}else{echo "no_image";}?>">
                                    <label class="custom-file-label" for="exampleInputFile">{{ __('admin/trainer.proof_file') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('admin/trainer.proof_upload') }}</span>
                                </div>
                                </div>
                                @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" class="form-control" id="oldpassword" name="old_password">

                                @error('old_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="newpassword">New Password</label>
                                <input type="password" class="form-control" id="newpassword" name="new_password">

                                @error('new_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirm_password">

                                @error('confirm_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>

                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection