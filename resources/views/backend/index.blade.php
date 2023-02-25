@extends('backend.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/dashboard.dashboard') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/dashboard.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/dashboard.dashboard') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <?php //echo '<pre>'; print_r($data['total_school']);die();?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">

          <div class="col-md-6">
              <div class="row">
               

                <div class="col-lg-6 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{$data['total_school']}}</h3>

                      <p>Schools</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-school"></i>
                    </div>
                    <a href="{{route('backend.schoolcreate.schoolCreate')}}" class="small-box-footer">Add School <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$data['total_trainer']}}</h3>

                        <p>Trainers </p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                      </div>
                      <a href="{{ route('backend.addtrainer.addTrainer') }}" class="small-box-footer">Add Trainer <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$data['total_student']}}</h3>

                        <p>Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                      </div>
                      <a href="#" class="small-box-footer">Add Student <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>$1000</h3>

                      <p>School Fee</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      More
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 col-6">
                <!-- small box -->
                  <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3>$350</h3>

                      <p>Trainer Payout</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                      More
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 col-6">
                  <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <h3>$650 </h3>
                        <p>Net Profit</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">
                        More
                      </a>
                    </div>
                </div>
               
              </div>
          </div> 
         
          <div class="col-md-12">
             <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Recently added Schools</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th> ID</th>
                      <th>School Name</th>
                      <th>Status</th>
                      <th>City</th>
                    </tr>
                    </thead>
                    <tbody>
                 
                 <!-- $data['latest_ten_school'] as $students -->
                    @foreach($data['latest_ten_school'] as $key=>$schools)
                    <tr>
                      <td><a href="pages/examples/invoice.html">{{$key+1}}</a></td>
                      <td>{{$schools['school_name']}}</td>
                       <td>
                        @if($schools['status'] == 1)
                        <span class="badge badge-success">Registered</span>
                        @else
                        <span class="badge badge-danger">Pending</span>
                        @endif
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$schools['city']}}</div>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div> -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
