<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="base_url" content="{{ url('/') }}" />
  <title>Kidspreneurship</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('asset/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/fullcalendar/main.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('asset/plugins/daterangepicker/daterangepicker.css')}}">

   <link rel="stylesheet" href="{{asset('asset/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/css/intlTelInput.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/css/style.css')}}">
  <!-- jQuery -->
  <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('asset/dist/js/countrypicker.js')}}"></script>
  <!-- Switch Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('asset/images/logo-icon.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        @if(Session::get('user_group') == 2)
          @if($schoolnotification->count() > 0)
            <a class="nav-link" href="{{ route('school.school-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{$schoolnotification->count()}}</span>
            </a>
          @else
            <a class="nav-link" href="{{ route('school.school-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"></span>
            </a>
          @endif
        @elseif(Session::get('user_group') == 3)
          @if($trainernotification->count() > 0)
            <a class="nav-link" href="{{ route('trainer.trainer-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{$trainernotification->count()}}</span>
            </a>
          @else
            <a class="nav-link" href="{{ route('trainer.trainer-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"></span>
            </a>
          @endif
        @elseif(Session::get('user_group') == 4)
          @if($studentnotification->count() > 0)
            <a class="nav-link" href="{{ route('student.student-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{$studentnotification->count()}}</span>
            </a>
          @else
            <a class="nav-link" href="{{ route('student.student-notification') }}">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"></span>
            </a>
          @endif
        @endif
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="c-icon cil-account-logout"></i>&nbsp;
                    @lang('Logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  