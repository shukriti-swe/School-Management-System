@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $project[0]['title'] }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $project[0]['title'] }}</li>
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
                <div class="card-body">
                    <p>{!! $project[0]['description'] !!}</p>

                    @foreach($project[0]['project'] as $attachment)
                        <div class="">
                            <a href="{{asset($attachment['attachment'])}}" target="_blank" class="btn btn-sm btn-warning m-2"><i class="fas fa-file-pdf"></i>{{ $attachment['attachment']}}</a>
                        </div>
                    @endforeach
                    <!-- <div class="">
                        <a class="btn btn-warning">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <a class="btn btn-warning ">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <a class="btn btn-danger">
                            <i class="fas fa-file-image"></i>
                        </a>

                        <a class="btn btn-danger">
                            <i class="fas fa-file-image"></i>
                        </a>
                    </div> -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

@endsection