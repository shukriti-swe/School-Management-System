@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-md-4">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Content</h3>
              </div>
              <div class="card-body table-responsive">
                  <table class="table">
                    <thead>
                     
                    
                        <th>Video</th>
                        <th>Title</th>
                      
                    </thead>
                    <tbody>
                     @foreach($data['content'] as $contens)
                      <tr>
                        <td>
                          <video width="80" height="50" controls>
                            <source src="{{url('/video/content/'.$contens['video'])}}" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>
                        </td>
                        <td>{{$contens['title']}}</td>
                      </tr>
                     @endforeach     
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Students</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  @foreach($data['students'] as $students)                 
                    <li>
                      @if($students['image'] != 'no_image')
                        <img src="{{asset($students['image'])}}" alt="User Image">
                      @else
                        <img src="{{ asset('img/default-150x150.png') }}" alt="Avater Image">
                      @endif
                      <a class="users-list-name" href="#">{{$students['name']}}</a>
                      <span class="users-list-date"></span>
                    </li>
                  @endforeach  
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('trainer.student_list')}}">View All Students</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Class Timetable</h3>
              </div>
              <div class="card-body table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Day</th>
                      <th>Time</th> 
                      <th>Grade</th> 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data['today_trainer_schedule'] as $schedules) 
                    <tr>
                    <?php 
                       if($schedules['day'] == '6'){
                  
                        $day='Saturday';
                         } 
                       if($schedules['day'] == '0'){
                    
                        $day='Sunday';
                       }
                      if($schedules['day'] == '1'){
                    
                        $day='Monday';
                       } 
                      if($schedules['day'] == '2'){
                      
                          $day='Thuesday';
                        } 
                      if($schedules['day'] == '3'){
                      
                          $day='Wednesday';
                      }
                      if($schedules['day'] == '4'){
                      
                          $day='Thursday';
                      } 
                   
                      if($schedules['day'] == '5')
                      {
                        $day='Friday';
                      }
                      ?> 
                      <td>{{$day}}</td>
                      <td>{{$schedules['class_start'].'-'.$schedules['class_end']}}</td>
                      <td>{{$schedules['grade']}}</td>
                    </tr> 
                  @endforeach                 
                  </tbody>
                </table>
              </div>
            </div>
          
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  To Do List
                </h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <ul class="todo-list ui-sortable" data-widget="todo-list">
                 @foreach($data['all_todo'] as $all_todos)    
                  <li>
                    <!-- drag handle -->
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" class="todo_checked" value="{{$all_todos->id}}" name="todo1" id="todoCheck{{$all_todos->id}}" @if($all_todos->todo_done == 1) checked @endif>
                      <label for="todoCheck{{$all_todos->id}}"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">{{$all_todos->todo_name}}</span>
                    <!-- Emphasis label -->
                    <!-- <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small> -->
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <a type="button" class="todo_edit" data-id="{{$all_todos->id}}"><i class="fas fa-edit"></i></a>
                      <a href="{{route('trainer.todo_delete',$all_todos->id)}}"><i class="fas fa-trash"></i></a>
                    </div>
                  </li>
                  @endforeach  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Training Hours (Start-To-Date)</h3>
              </div>
              <div class="card-body">
                <ul>
                  <li>{{$totalHour}} hours</li>
                </ul>
              </div>
            </div>
          </div>
        </div> 
          <br>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Todo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('trainer.todo_insert')}}" method="post" id="todo_submit">
        @csrf
        <div class="modal-body">
            <input type="text" class="form-control" name="todo_name" placeholder="Name">
            <span id="todo_error" class="text-danger"></span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Todo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('trainer.todo_update')}}" method="post" id="todo_update">
        @csrf
        <div class="modal-body">
        <input type="hidden" class="form-control" name="todo_id"  id="todo_id_show" >
            <input type="text" class="form-control" name="todo_name" placeholder="Name" id="todo_name_show">
            <span id="todo_error_new" class="text-danger"></span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    $('#todo_success').hide();
     //Trainer assign-------------------------
  $('#todo_submit').submit(function(e){
       e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        var custom_data=request;
        $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        async: false,
        data: custom_data,
        dataType: 'JSON',
        success: function(data) {
               if(data.error)
               {
                 $('#todo_error').html(data.error.todo_name[0]);
               }
               else
               {
                 $('#exampleModal').modal('hide');
                 $('#todd_success').addClass('alert alert-success');
                 $('#todo_success').html(data.success);
                 $('#todo_success').show();

                 window.location.reload() 
               }
          }  
      });
    });

    $('.todo_edit').click(function(e){
        var id=$(this).attr('data-id');
        $('#editModal').modal('show');
    
       $.ajax({
        type: 'get',
        url: "{{route('trainer.todo_edit')}}",
        data: {
        id: id,
        },
        success: function(data) {
            var data=JSON.parse(data);
            $('#todo_name_show').val(data.todo_name);
            $('#todo_id_show').val(data.id);
        }
       });
    });

    //Today Update code---------------
    $('#todo_update').submit(function(e){
       e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        var custom_data=request;
        $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        async: false,
        data: custom_data,
        dataType: 'JSON',
        success: function(data) {
               if(data.error)
               {
                 $('#todo_error_new').html(data.error.todo_name[0]);
               }
               else
               {
                 $('#editModal').modal('hide');
                 $('#todo_success').html(data.success);
                 $('#todo_success').show();

                 window.location.reload()
               }
          }  
      });
    });

    $('.todo_checked').click(function(){
        var id=$(this).val();
        if ($(this).is(':checked')) 
        {
            var action = 'checked';
         }
         else{
            var action = 'unchecked';
         }

         $.ajax({
            type: "POST",
            url: "{{route('trainer.todo_check')}}",
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
               "id": id,
               "action" : action,
            },
            dataType: 'JSON',
            success: function(data) {
               window.location.reload();
            },
         });

    });
</script>
@endsection