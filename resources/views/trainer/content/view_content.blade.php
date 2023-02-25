@extends('backend.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/content.view_content') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/content.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/content.view_content') }}</li>
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
               <div class="card-tools">
                  <a href="{{ route('trainer.content/list.contentList') }}" class="btn btn-primary"> All Content</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                      <video width="320" height="240" controls>
                        <source src="{{url('/video/content/'.$content['video'])}}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                  <div class="pt-4 pb-2">
                    <!-- <p><span class="badge badge-primary rounded-pill">{{$content['get_age_group']['age']}}</span></p>
                    <p><span class="badge badge-light rounded-pill">  {{$content['title']}}  </span></p> -->
                  </div>
                  <h5><b>Learning Objective</b></h5>
                  {!! $content['learning_object'] !!}
                  <h5><b>Outcome of session</b></h5>
                  {!! $content['outcome_session'] !!}
                  <h5><b>Questions to assess prior knowledge</b></h5>
                  {!! $content['question_access_knowledge'] !!}
                  <h5><b>How to introduce the topic to the students</b></h5>
                  {!! $content['introduce_topic_student'] !!}
                  <h5><b>Related Activity 1</b></h5>
                  {!! $content['related_activity_one'] !!}
                  <h5><b>Related Activity 2</b></h5>
                  {!! $content['related_activity_two'] !!}
                  <h5><b>Vocabulary</b></h5>
                  {!! $content['vocabulary'] !!}
                  <h4><b>Tips for parents/home assignments</b></h4>
                  {!! $content['tips_of_parents'] !!}
                  <!-- <div class="">
                      <a class="btn btn-warning" href="{{url('/files/content/'.$content['worksheet'])}}" download="">
                        <i class="fas fa-file-pdf"></i> 
                      </a> -->
                      <!-- <a class="btn btn-warning ">
                        <i class="fas fa-file-pdf"></i> 
                      </a>
                      <a class="btn btn-danger">
                        <i class="fas fa-file-image"></i> 
                      </a>
                      
                      <a class="btn btn-danger">
                        <i class="fas fa-file-image"></i> 
                      </a> -->
                   <!-- </div> -->
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>
@endsection