@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{__('admin.school_list')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('admin.school_list')}}</li>
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
              <div class="card-header">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(Session::has('suspend_success'))
                <div class="alert alert-success">
                    {{ Session::get('suspend_success') }}
                </div>
                @endif
               <div class="card-tools">
                  <a href="{{route('backend.schoolcreate.schoolCreate')}}" class="btn btn-primary"> + {{__('admin.add_school')}}</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{__('admin.id')}}</th>
                    <th>{{__('admin.School_name')}}</th>
                    <th>City</th> 
                    <th>{{__('admin.students')}}</th>
                    <th>Activity incharge</th>
                    <th>Fee</th>
                    <th>{{__('admin.status')}}</th>
                    <th>{{__('admin.action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($school_list as $key=>$row) 
                    <?php 
                      //  $grade=json_decode($row->number_of_student);
                      //  $sum=0;
                      //  foreach($grade as $grades)
                      //  {
                      //   $sum=$sum+$grades;
                      //  }
                    ?>
                    <tr>
                      <td>{{$key+1}}</td>
                      <!-- <td> <img src="../{{$row->school_logo}}" alt="Product 1" class="img-circle img-size-32 mr-2"> </td> -->
                      <td>{{$row->school_name}}</td>
                      <td style="word-break: break-all;">
                       {{$row->city}}
                      </td>
                      <td>{{$row->number_of_student}}</td>
                      <td>{{$row->incharge_name}}</td>
                      <td>
                        <?php if($row->membership_plan == '1'){?>
                           <span class="">$1000</span>
                        <?php } else if($row->membership_plan == '2'){?>
                            <span class="">$2000</span>
                        <?php } else if($row->membership_plan == '3'){?>
                                <span class="">$3000</span>
                        <?php } ?>
                      </td>
                      <td>
                       <?php if($row->user->suspend == 2){?>   
                        <small class="badge badge-success">{{__('admin.active')}}</small>
                       <?php }else if($row->user->suspend == 1){?>
                        <small class="badge badge-danger">{{__('admin.suspended')}}</small>
                        <?php } ?>
                      </td>
                      <td>
                         <a  href="{{route('backend.studentList.studentList',$row->id)}}" class="btn btn-block btn-secondary btn-sm">Student List</a>
                        <?php if ($row->user->suspend == 1) { ?>
                          <a href="{{route('backend.school-unsuspend',$row->user->id)}}" id="unsuspend" class="btn btn-block btn-warning btn-sm" title="Unuspend">
                            <i class="fas fa-user-lock"></i>
                          </a>
                        <?php } else { ?>
                          <a href="{{route('backend.school-suspend',$row->user->id)}}" id="suspend" class="btn btn-block btn-success btn-sm" title="Suspend">
                            <i class="fas fa-user-lock"></i>
                          </a>
                        <?php } ?>
                        <a  href="{{route('backend.viewschool.viewschool',$row->id)}}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{route('backend.schooledit.schoolEdit',$row->id)}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{route('backend.schooldelete.schoolDelete',$row->id)}}" id="deleteSchool" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>
  
  <script>
   $(document).ready(function() {
    //   alert('hello');
    
    //delete school sweetalert
      $(document).on('click', '#deleteSchool', function(e) {
        e.preventDefault();
        var Id = $(this).attr('href');

        swal({
              title: "Are you sure?",
              text: "You want to delete this file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Success! Your file has been deleted!", {
                     icon: "success",
                  });

                  window.location.href=Id;
                  
              } else {
                  swal("Your file is safe!");
              }

            });
        });
    
    //suspend sweetalert
    $(document).on('click', '#suspend', function(e) {
        e.preventDefault();
        var Id = $(this).attr('href');

        swal({
              title: "Are you sure?",
              text: "You want to suspend this school!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Success! School successfully suspend!", {
                     icon: "success",
                  });

                  window.location.href=Id;
                  
              } else {
                  swal("Your file is safe!");
              }

            });
        });
        
    //unsuspend sweetalert
    $(document).on('click', '#unsuspend', function(e) {
        e.preventDefault();
        var Id = $(this).attr('href');

        swal({
              title: "Are you sure?",
              text: "You want to unsuspend this school!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Success! School successfully unsuspend!", {
                     icon: "success",
                  });

                  window.location.href=Id;
                  
              } else {
                  swal("Your file is safe!");
              }

            });
        });
        
    
   });
   </script>
  
  
  
@endsection