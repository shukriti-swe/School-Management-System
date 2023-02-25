@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Project</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <form action="{{route('student.update-project')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Project Title</label>
                                    <input type="hidden" name="id" value="{{ $project[0]['id']}}">
                                    <input type="hidden" name="student_id" value="{{$student_id}}">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $project[0]['title']}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Project Description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $project[0]['description']}}</textarea>
                                </div>
                                <div class="form-group">
                                   
                                    @if(count($project[0]['project'])> 0)
                                        @foreach($project[0]['project'] as $key=>$attachment)
                                     
                                        <div class="project_example mt-2 mb-4">
                                            <label>Edit Attachment file</label>
                                            <input type="hidden" name="old_image[]" value="{{$attachment['attachment']}}">
                                            <input type="file" class="form-control mb-2" name="attachment[]">
                                            <span role="button" class=" ms-2 badge badge-info addBtn">Add More</span>
                                            <span role="button" class=" ms-2 badge badge-danger d-inline btnRemove">Remove</span>
                                        </div>
                                            @if(isset($attachment->attachment))
                                                <a href="{{asset($attachment['attachment'])}}" target="_blank" class="btn btn-sm btn-warning m-2">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="project_example mt-2 mb-4">
                                            <label>Edit Attachment file</label>
                                            <input type="file" class="form-control mb-2" name="attachment[]">
                                            <span role="button" class=" ms-2 badge badge-info addBtn">Add More</span>
                                            <span role="button" class=" ms-2 badge badge-danger d-inline btnRemove">Remove</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection