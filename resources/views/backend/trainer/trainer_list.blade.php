@extends('backend.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/trainer.trainer_list') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/trainer.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/trainer.trainer_list') }}</li>
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

              @if(session()->has('success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('success') }}
                  </div>
              @endif

              @if(session()->has('update_success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('update_success') }}
                  </div>
              @endif
              
              @if(session()->has('suspend_success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('suspend_success') }}
                  </div>
              @endif
                
               <div class="card-tools">
                  <a href="{{ route('backend.addtrainer.addTrainer') }}" class="btn btn-primary">{{ __('admin/trainer.add_trainer') }}</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('admin/trainer.full_name') }}</th>
                    <th>{{ __('admin/trainer.city') }}</th>
                    <th>{{ __('admin/trainer.students') }}</th>
                    <th>{{ __('admin/trainer.hours') }}</th>
                    <th>{{ __('admin/trainer.payout') }}</th> 
                    <th>{{ __('admin/trainer.status') }}</th>
                    <th>{{ __('admin/trainer.action') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($trainers as $trainer)
                    <tr>
                      <td>{{$trainer['trainer_name']}}</td>
                      <td>{{$trainer['city']}}</td>
                      <td>---</td>
                      <td>1</td>
                      <td>{{$trainer['trainer_fee']}}</td>
                      <td>
                        @if($trainer['status']==1)
                        <small class="badge badge-success">Active</small>
                        @elseif($trainer['status']==2)
                        <small class="badge badge-success">Deactive</small>
                        @endif
                      </td>
                      <td>
                        <?php $delete_ids= $trainer['id'].'|'.$trainer['user_id']?>
                        @if($trainer['user']['suspend'] == 1)
                          <a href="{{route('backend.trainer-unsuspend',$trainer['user']['id'])}}" id="unsuspend" class="btn btn-block btn-warning btn-sm" title="Unsuspend">
                            <i class="fas fa-user-lock"></i>
                          </a>
                        @else
                          <a href="{{route('backend.trainer-suspend',$trainer['user']['id'])}}" id="suspend" class="btn btn-block btn-success btn-sm" title="Suspend">
                            <i class="fas fa-user-lock"></i>
                          </a>
                        @endif
                        <a type="button" href="{{ route('backend.traineredit.trainerEdit',$trainer['id']) }}" class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a type="button" href="{{ route('backend.trainerdelete.trainerDelete',$delete_ids) }}" id="deleteTrainer" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
      $(document).on('click', '#deleteTrainer', function(e) {
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
              text: "You want to suspend this trainer!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Success! Trainer successfully suspend!", {
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
              text: "You want to unsuspend this trainer!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Success! Trainer successfully unsuspend!", {
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




