@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Events List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Events List</li>
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
          <!-- /.card-header -->
          <div class="card-body table-responsive">
             <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Last Date To Submit</th>
                    <th>Fee</th>
                    <th>Event Date</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    @foreach($events as $event)
                    <tr>
                      <td><?='#'.$i?></td>
                      <td><img src="{{asset($event['event_image'])}}" height="150" width="150" alt="Product 1" class="img-rounded img-size-80"> </td>
                      <td>{{$event['event_name']}}</td>
                      <td>{{$event['event_last_date']}}</td>
                      <td>{{$event['event_fee']}}</td>
                      <td>{{$event['event_date']}}</td>                    
                      <td>
                        <a  href="{{ route('student.event_view',$event['id']) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        
                      </td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    
                  </tbody>
                 </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </section>
  </div>
@endsection