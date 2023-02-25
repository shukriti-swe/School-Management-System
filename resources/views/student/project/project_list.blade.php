@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Projects</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('student.add-project') }}" class="btn btn-primary"> + Add Projects</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th class="col-md-3">Attachment</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($projects as $project)

                            <tr>
                                <td> {{ $project->id }} </td>
                                <td> {{ $project->title }} </td>

                                <td>
                                    @foreach($project->project as $attachment)
                                        <div class="">
                                            <a href="{{asset($attachment->attachment)}}" target="_blank" class="btn btn-sm btn-warning m-2">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </td>
                                <td>{!! $project->description !!}</td>

                                <td>
                                    <a href="{{ route('student.view-project', $project->id) }}" class="btn btn-block btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('student.edit-project', $project->id) }}" class="btn btn-block btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <!-- <button type="button" class="btn btn-block btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button> -->
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection