@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Certification</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Certification</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
        
          <div class="card-body p-0">
            <div class="col-md-12 m-auto">
                <button type="button" class="btn">
                    @if(isset($assessment))

                        @if($attendance >= 85)
                            <span class="bs-stepper-circle bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        @endif

                    @else
                        <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                    @endif
                    <span class="bs-stepper-label">Attendance – 85%</span>
                </button>
                <button type="button" class="btn">
                    @if(isset($assessment))

                        @if($assessment->count() == 4)
                            <span class="bs-stepper-circle bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        @endif

                    @else
                        <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                    @endif
                    <span class="bs-stepper-label">Take Assessment</span>
                </button>
                <button type="button" class="btn">
                    @if(isset($project))

                        @if($project->count() > 0)
                            <span class="bs-stepper-circle bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        @endif

                    @else
                        <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                    @endif
                    <span class="bs-stepper-label">Upload Project Details</span>
                </button>
                <button type="button" class="btn">
                    @if(isset($assignment))

                        @if($assignment->read_status == 1 && $assignment->comment_status == 1)
                            <span class="bs-stepper-circle bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        @endif

                    @else
                        <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                    @endif
                    <span class="bs-stepper-label">Finish 100% Assignments</span>
                </button>
                <button type="button" class="btn">
                    @if(isset($attendance, $assessment, $project, $assignment))

                        @if($attendance >= 85 && $assessment->count() == 4 && $project->count() > 0 && $assignment->read_status == 1 && $assignment->comment_status == 1)
                            <span class="bs-stepper-circle bg-success"><i class="fas fa-check"></i></span>
                        @else
                            <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        @endif
                    
                    @else
                        <span class="bs-stepper-circle bg-danger"><i class="fas fa-times"></i></span>
                        <!-- <span class="alert alert-danger">Assignment Not Found</span> -->
                    @endif
                    <span class="bs-stepper-label">Get Certified</span>
                </button>
                @if(isset($attendance, $assessment, $project, $assignment))

                    @if($attendance >= 85 && $assessment->count() == 4 && $project->count() > 0 && $assignment->read_status == 1 && $assignment->comment_status == 1)
                        <div class="text-center mb-2 mt-2">
                            <div class="text-center mb-2">
                                <img src="{{asset('image/certificate.jpg')}}" >
                            </div>
                            <a href="{{asset('image/certificate.jpg')}}" target="_blank" class="btn btn-primary">Download Certificate</a>
                        </div>
                    @else
                        <div class="text-center mb-2 mt-2">
                            <div class="text-center mb-2">
                                <img src="{{asset('image/certificate.jpg')}}" style="opacity: 0.5;">
                            </div>
                            <button class="btn btn-primary d-none">Download Certificate</button>
                        </div>
                    @endif

                @else
                    <div class="text-center mb-2 mt-2">
                        <div class="text-center mb-2">
                            <img src="{{asset('image/certificate.jpg')}}" style="opacity: 0.5;">
                        </div>
                        <button class="btn btn-primary d-none">Download Certificate</button>
                    </div>
                @endif


            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection