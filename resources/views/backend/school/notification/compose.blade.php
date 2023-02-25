@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> {{ __('admin/trainer.inbox') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"> {{ __('admin/trainer.home') }}</a></li>
            <li class="breadcrumb-item active"> {{ __('admin/trainer.inbox') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if(session()->has('error'))
    <div class="alert alert-danger" style="text-align: center;">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="row">

      <div class="col-md-3">
        <a href="{{route('backend.school-notificationbox')}}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

        <div class="card">
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active">
                <a href="{{route('backend.school-notificationbox')}}" class="nav-link">
                  <i class="fas fa-inbox"></i> Notification List
                  <span class="badge bg-primary float-right">12</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
      </div>

      <!-- /.col -->
      <div class="col-md-9">

        <form action="{{ route('backend.school-notification-send') }}" method="POST">
          @csrf
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Compose New Message</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label for="school">Select School</label>
                <select name="school_id" class="form-control" id="school">
                  @foreach($schools as $school)
                  <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="grade">Select Grade</label>
                <select name="grade_id" class="form-control" id="grade">
                  @foreach($grades as $grade)
                  <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="notificationtitle">Title</label>
                <input type="text" class="form-control" name="title" id="notificationtitle">
              </div>
              <div class="form-group">
                <label for="notificationbody">Description</label>
                <textarea id="notificationbody" name="description" class="form-control" style="height: 150px"></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
            </div>
            <!-- /.card-footer -->
          </div>
        </form>
        <!-- /.card -->
      </div>
      <!-- /.col -->


    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

@endsection