@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('admin/content.edit_content') }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __('admin/content.home') }}</a></li>
              <li class="breadcrumb-item active">{{ __('admin/content.edit_content') }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <form action="{{ route('backend.updatecontent.updateContent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
           <div class="col-md-6">
              <div class="card card-primary">
                 <div class="card-header">
                  
                 </div>
                 
                    <div class="card-body">

                        <div class="form-group">
                          <input type="hidden" value="<?=$content['id']?>" name="id">
                          <label for="eventstart">{{ __('admin/content.edit_content') }}</label>
                          <select class="form-control" name="ageGroup_id" id="ageGroup_id">
                             @foreach($AgeGroups as $AgeGroup)
                           <option value="{{$AgeGroup['id']}}"<?php if($content['ageGroup_id']==$AgeGroup['id']){echo "selected";} ?>>{{$AgeGroup['age']}}</option>
                             @endforeach
                          </select>
                          <span role="button" class="badge badge-info rounded-pill" data-toggle="modal" data-target="#addAgeGroup">{{ __('admin/content.add_agegroup') }}</span>
                          @error('ageGroup_id')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="eventstart">{{ __('admin/content.select_stream') }}</label>
                          <select class="form-control" name="stream_id" id="stream_id">
                            @foreach($streams as $stream)
                            <option value="{{$stream['id']}}" <?php if($content['stream_id']==$stream['id']){echo "selected";} ?>>{{$stream['title']}}</option>
                            @endforeach
                          </select>
                          <span role="button" class="badge badge-info rounded-pill" data-toggle="modal" data-target="#addStream">{{ __('admin/content.add_stream') }}</span>
                          @error('stream_id')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="inchargename">{{ __('admin/content.content_title') }}</label>
                          <input type="text" class="form-control" id="inchargename" placeholder="" name="title" value="{{$content['title']}}">
                          @error('title')
                              <strong class="text-danger">{{ $message }}</strong>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="eventimages">{{ __('admin/content.event_video') }}</label>
                          <input type="hidden" value="{{$content['video']}}" name="pre_video">
                          <input type="file" class="form-control" id="eventimage" placeholder="" name="video">
                        </div>

                        <div class="form-group">
                          <label for="Worksheets">{{ __('admin/content.worksheets') }}</label>
                          <input type="hidden" value="{{$content['worksheet']}}" name="pre_worksheet">
                          <input type="file" class="form-control" id="Worksheets" placeholder="" name="worksheets">
                        </div>
                        

                    </div>
                 
              </div>
              
           </div>
            
           <div class="col-md-6">
            <div class="card card-warning">
              <div class="card-header">

              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Learning Objective</label>
                  <textarea id="contentdescription" class="form-control" name="learning_object">{{$content['learning_object']}}</textarea>
                </div>
                @error('learning_object')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Outcome of session</label>
                  <textarea id="contentdescription_1" class="form-control" name="outcome_session">{{$content['outcome_session']}}</textarea>
                </div>
                @error('outcome_session')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Questions to assess prior knowledge</label>
                  <textarea id="contentdescription_2" class="form-control" name="question_access_knowledge">{{$content['question_access_knowledge']}}</textarea>
                </div>
                @error('question_access_knowledge')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">How to introduce the topic to the students</label>
                  <textarea id="contentdescription_3" class="form-control" name="introduce_topic_student">{{$content['introduce_topic_student']}}</textarea>
                </div>
                @error('introduce_topic_student')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Related Activity 1</label>
                  <textarea id="contentdescription_4" class="form-control" name="related_activity_one">{{$content['related_activity_one']}}</textarea>
                </div>
                @error('related_activity_one')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Related Activity 2</label>
                  <textarea id="contentdescription_5" class="form-control" name="related_activity_two">{{$content['related_activity_two']}}</textarea>
                </div>
                @error('related_activity_two')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Vocabulary</label>
                  <textarea id="contentdescription_6" class="form-control" name="vocabulary">{{$content['vocabulary']}}</textarea>
                </div>
                @error('vocabulary')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Tips for parents/home assignments</label>
                  <textarea id="contentdescription_7" class="form-control" name="tips_of_parents">{{$content['tips_of_parents']}}</textarea>
                </div>
                @error('tips_of_parents')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary mt-4">{{ __('admin/content.submit') }}</button>
              </div>
            </div>
          </div>
        </div>
    </form>



        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="addStream">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ __('admin/content.add_stream') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       
            <div class="form-group">
              <label>{{ __('admin/content.stream_name') }}</label>
              <input type="text" class="form-control" id="gettitle">
            </div>
      
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin/content.cancel') }}</button>
          <button type="button" class="btn btn-primary" id="streamAdd" data-dismiss="modal">{{ __('admin/content.add_stream') }}</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="addAgeGroup">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ __('admin/content.add_agegroup') }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       
            <div class="form-group">
              <label>{{ __('admin/content.agegroup_name') }}</label>
              <input type="text" class="form-control" id="getagegroup">
            </div>
      
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin/content.cancel') }}</button>
          <button type="button" class="btn btn-primary" id="ageGroupAdd" data-dismiss="modal">{{ __('admin/content.add_agegroup') }}</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script>
    $(document).ready(function(){

      $('#streamAdd').click(function(){
          var stream_name = $('#gettitle').val();
          $.ajax({
              url:"{{ route('backend.addstream.addStream') }}",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method:"POST",
              data:{stream_name:stream_name},
              dataType:'json',
              success:function(data)
              {
                console.log(data['id']);
                var id = data['id'];
                var title = data['title'];
                var html = '<option value="'+id+'" selected>'+title+'</option>';
                
                $("#stream_id").append(html);
              }
          });
          
      });

      $('#ageGroupAdd').click(function(){
          var agegroup_name = $('#getagegroup').val();
         
          $.ajax({
              url:"{{ route('backend.addagegroup.addAgeGroup') }}",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method:"POST",
              data:{agegroup_name:agegroup_name},
              dataType:'json',
              success:function(data)
              {
                
                var id = data['id'];
                var age = data['age'];
                var html = '<option value="'+id+'" selected>'+age+'</option>';
                
                $("#ageGroup_id").append(html);


              }
          });
          
      });

    });
  </script>
@endsection