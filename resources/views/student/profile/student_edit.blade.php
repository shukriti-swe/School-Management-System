@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item active">View Student</li>
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

                        <!-- <form action="{{route('student.student-update')}}" method="POST" enctype="multipart/form-data"> -->

                        <input type="hidden" name="student_id" value="{{$student['id']}}">
                        <input type="hidden" name="user_id" value="{{$student['std_user']['id']}}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$student['std_user']['name']}}" disabled>
                                @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Student Grade</label>
                                <input type="text" class="form-control @error('grade_id') is-invalid @enderror" id="grade_id" name="grade_id" value="{{$student['grade_id']}}" disabled>
                                @error('grade_id')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="project">Project</label>
                                <input type="text" class="form-control @error('project') is-invalid @enderror" id="project" name="project" placeholder="" value="{{$student['project']}}" disabled>

                                @error('project')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="assignment">Assignment</label>
                                <input type="text" name="assignment" id="assignment" class="form-control @error('assignment') is-invalid @enderror" value="{{ $student['assignment'] }}" disabled>

                                @error('assignment')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="classheld">Sessions Held</label>
                                <input type="text" class="form-control @error('classes_held') is-invalid @enderror" id="classheld" name="classes_held" placeholder="" value="{{$student['classes_held']}}" disabled>

                                @error('classes_held')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="classattended">Sessions Attended</label>
                                <input type="text" class="form-control @error('classes_attended') is-invalid @enderror" id="classattended" name="classes_attended" placeholder="" value="{{$student['classes_attended']}}" disabled>

                                @error('classes_attended')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="attendance">Attendance</label>
                                <input type="text" class="form-control @error('attendance') is-invalid @enderror" id="attendance" name="attendance" placeholder="" value="{{$student['attendance']}}" disabled>

                                @error('attendance')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="overal_grade">Overal Grade</label>
                                <input type="text" class="form-control @error('overal_grade') is-invalid @enderror" id="overal_grade" name="overal_grade" placeholder="" value="{{$student['overal_grade']}}" disabled>

                                @error('overal_grade')
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
                                <label for="father_name">Father Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="" value="{{$student['father_name']}}" disabled>

                                @error('father_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mother_name">Mother Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" placeholder="" value="{{$student['mother_name']}}" disabled>

                                @error('mother_name')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="" value="{{$student['std_user']['email']}}" disabled>

                                @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mobile">Phone</label>
                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="" value="{{$student['std_user']['mobile']}}" disabled>

                                @error('mobile')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="" value="{{$student['address']}}" disabled>

                                @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <input type="text" class="form-control @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group" placeholder="" value="{{$student['blood_group']}}" disabled>

                                @error('blood_group')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="date_of_brith">Date Of Brith</label>
                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" placeholder="" value="{{date('Y-m-d',strtotime($student['std_user']['date_of_birth']))}}" disabled>

                                @error('date_of_brith')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" placeholder="" value="{{$student['std_user']['gender']}}" disabled>

                                @error('gender')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection