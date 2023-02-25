@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">

                @if($student->image != 'no_image')
                <img class="profile-user-img img-fluid img-circle" src="{{asset($student->image)}}" alt="User profile picture">
                @else
                <img src="{{ asset('img/default-150x150.png') }}" alt="Product 1" class="img-circle mr-2">
                @endif

              </div>

              <h3 class="profile-username text-center">{{ $student->user->name }}</h3>

              <p class="text-muted text-center">{{ $student->school->school_name }}</p>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> DOB</strong>

              <p class="text-muted">
                <strong> Blood Group:</strong> {{ $student->blood_group }}
                <br>
                <strong>Date of brith:</strong> {{ $student->user->date_of_birth }}
                <br>
                <strong>Father Name:</strong> {{ $student->father_name }}
                <br>
                <strong>Mother Name:</strong> {{ $student->mother_name }}
                <br>
                <strong>Email:</strong> {{ $student->user->email }}
                <br>
                <strong>Phone:</strong> {{ $student->user->mobile }}
                <br>
                <strong>Activity Incharge:</strong> {{ $student->activity_incharge }}
              </p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

              <p class="text-muted">{{ $student->address }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-9">
          <div class="card card-info">
            <div class="card-body">
              <div class="row">

                <div class="col-md-6">
                  <div class="info-box mb-3 bg-info">
                    <div class="info-box-content">
                      <span class="info-box-text">Projects</span>
                      <span class="info-box-number">{{ $student->project }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mb-3 bg-warning">
                    <div class="info-box-content">
                      <span class="info-box-text">Assignment</span>
                      <span class="info-box-number">{{ $student->assignment }} / 48</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="info-box mb-3 bg-primary">
                        <div class="info-box-content">
                          <span>Sessions Held</span>
                          <span class="info-box-number">10</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="info-box mb-3 bg-danger">
                        <div class="info-box-content">
                          <span>Sessions Attended</span>
                          <span class="info-box-number">8</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="info-box mb-3 bg-secondary">
                        <div class="info-box-content">
                          <span>Attendance</span>
                          <span class="info-box-number">90%</span>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="card direct-chat direct-chat-primary">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                          <h3 class="card-title mb-2">Comments</h3>

                            <table class="table table-bordered table-striped">

                              <tbody>
                                @foreach($comments as $comment)
                                  <tr>
                                    <td>{{$comment['title']}}</td>
                                  </tr>
                                @endforeach
                              </tbody>

                            </table>

                            <h3 class="card-title mb-2">Feedback</h3>

                            <table class="table table-bordered table-striped">
                              <tbody>

                                @if($feedbacks->count() > 0)
                                  @foreach($feedbacks as $feedback)
                                    <tr>
                                      <td>{{$feedback['feedback']}}</td>
                                    </tr>
                                  @endforeach
                                @else
                                  <tr>
                                    <td>No Feedback Found</td>
                                  </tr>
                                @endif
                                
                              </tbody>
                            </table>

                        </div>
                        <!-- /.card-footer-->
                      </div>
                    </div>

                    
                    <div class="col-md-6">
                      <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Overall Grade</span>
                          <span class="info-box-number">A<sup>+</sup></span>
                        </div>
                      </div>
                      <div class="card card-outline card-success">
                        <div class="card-header">
                          <h3 class="card-title">Assessment Parameters</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <ul>
                            <li>Emotional Quotient (EQ)-1-10</li>
                            <li>Intelligence Quotient (IQ) -1-10</li>
                            <li>Creative &amp; Critical Thinking Quotient (CQ) -1-10</li>
                            <li>Adversity Quotient (AQ) -1-10</li>
                            <li>Social Quotient (SQ) -1-10</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection