@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('admin/content.add_content') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ __('admin/content.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('admin/content.add_content') }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <form action="{{ route('backend.storecontent.storeContent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">

              </div> 

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">{{ __('admin/content.age_group') }}</label>
                  <select class="form-control" name="ageGroup_id" id="ageGroup_id">
                    <option value="">---Select---</option>
                    @foreach($AgeGroups as $AgeGroup)
                    <option value="{{$AgeGroup['id']}}">{{$AgeGroup['age']}}</option>
                    @endforeach
                  </select>
                  <span role="button" class="badge badge-success rounded-pill p-1 mt-1" data-toggle="modal" data-target="#addAgeGroup">{{ __('admin/content.add_age') }}</span>
                  @error('ageGroup_id')
                      <strong class="text-danger">{{ $message }}</strong>
                   @enderror
                </div>
                <div class="form-group">  
                  <label for="eventstart">{{ __('admin/content.select_stream') }}</label>
                  <select class="form-control" name="stream_id" id="stream_id">
                  <option value="">---Select---</option>
                    @foreach($streams as $stream)
                    <option value="{{$stream['id']}}">{{$stream['title']}}</option>
                    @endforeach
                  </select>
                  <span role="button" class="badge badge-info rounded-pill" data-toggle="modal" data-target="#addStream">{{ __('admin/content.add_stream') }}</span>
                  @error('stream_id')
                      <strong class="text-danger">{{ $message }}</strong>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="inchargename">{{ __('admin/content.content_title') }}</label>
                  <input type="text" class="form-control" id="inchargename" placeholder="" name="title">
                  @error('title')
                      <strong class="text-danger">{{ $message }}</strong>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="eventimages">{{ __('admin/content.event_video') }}</label>
                  <input type="file" class="form-control" id="eventimage" placeholder="" name="video">
                  @error('video')
                      <strong class="text-danger">{{ $message }}</strong>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="Worksheets">{{ __('admin/content.worksheets') }}</label>
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
                  <textarea id="contentdescription" class="form-control" name="learning_object"></textarea>
                </div>
                @error('learning_object')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Outcome of session</label>
                  <textarea id="contentdescription_1" class="form-control" name="outcome_session"></textarea>
                </div>
                @error('outcome_session')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Questions to assess prior knowledge</label>
                  <textarea id="contentdescription_2" class="form-control" name="question_access_knowledge"></textarea>
                </div>
                @error('question_access_knowledge')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">How to introduce the topic to the students</label>
                  <textarea id="contentdescription_3" class="form-control" name="introduce_topic_student"></textarea>
                </div>
                @error('introduce_topic_student')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Related Activity 1</label>
                  <textarea id="contentdescription_4" class="form-control" name="related_activity_one"></textarea>
                </div>
                @error('related_activity_one')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Related Activity 2</label>
                  <textarea id="contentdescription_5" class="form-control" name="related_activity_two"></textarea>
                </div>
                @error('related_activity_two')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Vocabulary</label>
                  <textarea id="contentdescription_6" class="form-control" name="vocabulary"></textarea>
                </div>
                @error('vocabulary')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>

              <div class="card-body">
                <div class="form-group">
                  <label for="eventstart">Tips for parents/home assignments</label>
                  <textarea id="contentdescription_7" class="form-control" name="tips_of_parents"></textarea>
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
          <span id="stream_error" class="text-danger"></span>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default">{{ __('admin/content.cancel') }}</button>
        <button type="button" class="btn btn-primary" id="streamAdd">{{ __('admin/content.add_stream') }}</button>
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

          <span id="group_error" class="text-danger"></span>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default">{{ __('admin/content.cancel') }}</button>
        <button type="button" class="btn btn-primary" id="ageGroupAdd">{{ __('admin/content.add_agegroup') }}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).ready(function() {

    
   

    //  $('#eventdescription').summernote({
    //   placeholder: 'Event description',
    //   tabsize: 2,
    //   height: 385,
    // })

    $('#streamAdd').click(function() {
      var stream_name = $('#gettitle').val();
      $.ajax({
        url: "{{ route('backend.addstream.addStream') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        data: {
          stream_name: stream_name
        },
        dataType: 'json',
        success: function(data) {

          if(data.error){
            $('#stream_error').html(data.error.stream_name[0]);
          }else{
            var id = data['id'];
            var title = data['title'];
            var html = '<option value="' + id + '" selected>' + title + '</option>';
            $("#stream_id").append(html);
            $('#addStream').modal('hide');
          }

        }
      });

    });

    $('#ageGroupAdd').click(function() {
      var agegroup_name = $('#getagegroup').val();

      $.ajax({
        url: "{{ route('backend.addagegroup.addAgeGroup') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        data: {
          agegroup_name: agegroup_name
        },
        dataType: 'json',
        success: function(data) {

          if(data.error){
            $('#group_error').html(data.error.agegroup_name[0]);
          }else{
            var id = data['id'];
            var age = data['age'];
            var html = '<option value="' + id + '" selected>' + age + '</option>';
            $("#ageGroup_id").append(html);
            $('#addAgeGroup').modal('hide');
          }


        }
      });

    });

  });
</script>
@endsection