@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Students</li>
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
              <div class="col-md-3">
                <div class="card"> 
                  <div class="card-header">
                    <h3 class="card-title">
                       You are managing 320 students 
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="max-height:500px;overflow-y: scroll;">  
                  <table class="table table-striped table-valign-middle">
                  <tbody>
                    @foreach($students as $student)
                    <tr class="remove_bg @if($one_student['id'] == $student['id']) bg-secondary @endif">
                      <td>
                        <a href="javascript:void" class="student_feedback" data-id="{{$student['id']}}">
                          <img src="{{ asset('img/default-150x150.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                          {{ $student['name']}} <br>
                        </a>
                        <p style="font-size: 11px; margin-left: 45px">
                          <span class="info-box-text">Grade</span>
                          <span class="info-box-number">{{ $student['grade_id'] }} th</span>
                        </p>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              
              <div class="col-md-9">
                 <div class="body_add">

                 </div>
                <!-- <div class="card">
                  <div class="card-body">
                     <div class="form-group">
                        <label>Select Year & Term</label>
                        <select class="form-control">
                          <option value="">2022</option>
                          <option value="">2021</option>
                          <option value="">2020</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Add Feedback</label>
                        <textarea class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Add Grade</label>
                        <input type="text" class="form-control" name="">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>78</h3>

                              <p>Assignments </p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                           
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3>53%</h3> 
                              <p>Project</p>
                            </div>
                            <div class="icon">
                              <i class="fas fa-user-graduate"></i>
                            </div>
                        
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>  -->
               
              </div>
              
            </div>   

      </div>
    </section>
  </div>

  <script>
  $( document ).ready(function(){ 

    var current_year=<?php echo date("Y");?>;
    var privous_year=current_year - 1;
    var privous_2year=privous_year - 1;
    //console.log(privous_2year); 
    $('.student_feedback').on("click", function() {
      $('.remove_bg').removeClass('bg-secondary');
      $(this).parent().parent().addClass('bg-secondary');
      var studentId = $(this).attr('data-id');
      $.ajax({
        type: "POST",
        url: "{{ route('trainer.student_feedback') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          studentId: studentId
        },
        dataType: 'json',
        success: function(data) {
          var add_div;
          var check_value;
          //var data2=data.assesment
            //.log(data.assesment);
            //console.log(data.assesment.assessment);
            // if(data.assesment.assessment)
            // {
    
            //   check_value='checked';
            // }
            // else 
            // {
            //   //alert('hello');
            //   check_value='';
            // }
            // if(data.assesment.length != 0){
            //    add_div='<div class="icheck-primary d-inline mb-2"><input type="checkbox" class="student_assesment" value="'+data.id+'" name="todo1" id="todoCheck" '+check_value+'><label for="todoCheck" class="">Assesment Done</label></div>';
            // }
            // else
            // {
            //   add_div='';
            // }
            var html = '<div class="" id="todo_success"></div><form action="" method="post" id="feedback_submit">@csrf <input type="hidden" name="student_id" value="'+data.id+'"><div class="card"><div class="card-body"><div class="form-group"><label>Select Year & Term</label><select class="form-control" name="year"><option value="">---Select----</option><option value="'+current_year+'">'+current_year+'</option><option value="'+privous_year+'">'+privous_year+'</option><option value="'+privous_2year+'">'+privous_2year+'</option></select><span class="text-danger" id="year_error"></span></div><div class="form-group"><label>Select Level</label><select name="level" id="" class="form-control"><option value="">---Select---</option><option value="L1">L1</option><option value="L2">L2</option><option value="L3">L3</option><option value="L3">L4</option></select><span id="level_error" class="text-danger"></span></div> <div class="form-group"><label>Add Feedback</label><textarea class="form-control" name="feedback"></textarea><span class="text-danger" id="feedback_error"></span></div><div class="form-group"><label>Add Grade</label><input type="text" class="form-control" name="grade"><span class="text-danger" id="grade_error"></span></div><div class="row"><div class="col-md-6"><div class="small-box bg-info"><div class="inner"><h3>78</h3><p>Assignments</p></div><div class="icon"><i class="fas fa-chalkboard-teacher"></i></div></div></div><div class="col-md-6"><div class="small-box bg-success"><div class="inner"><h3>53%</h3><p>Project</p></div><div class="icon"><i class="fas fa-user-graduate"></i></div></div></div></div></div><div class="icheck-primary d-inline ml-4 mb-2"><input type="checkbox" class="student_assesment" value="'+data.id+'" name="assesment" id="todoCheck" '+check_value+'><label for="todoCheck" class="">Assesment Done</label></div><div class="card-footer"><button type="button" class="btn btn-primary feedback_submit">Submit</button></div></div> </form>';

            $('.body_add').html(html);


        }
      });
    });

    //feedback submit-----------------------
    $(document).on("click",".feedback_submit",function() {
        var custom_data = $('#feedback_submit').serialize();
        $('#todo_success').css('display','none');
        $.ajax({
        type: "POST",
        url: "{{route('trainer.student_feedback_submit')}}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        data: custom_data,
        dataType: 'json',
        success: function(data){
          //var check=Object.values(data.error);
        //   console.log(typeof data);
        //   console.log(check);
        //  console.log(data.error.year[0]);
            if(data.error)
            {
              // if(jQuery.inArray("year", data.error) != -1) {
     
              //    $('#year_error').html(data.error.year[0]);  
              // }
              // else if(data.error.year == ''){
              //   alert('hiii');
              //  $('#year_error').html('');
              // }
              $('#year_error').html(data.error.year[0]);
              $('#level_error').html(data.error.level[0]);  
              $('#feedback_error').html(data.error.feedback[0]);
              $('#grade_error').html(data.error.grade[0]);
            }
            if(data.feedback_check)
            {
              alert('Data Already exist');
              $('#feedback_submit')[0].reset();
            }
            if(data.success)
            {
              $('#feedback_submit')[0].reset();
              $('#todo_success').addClass('alert alert-success');
              $('#todo_success').css('display','block');
              $('#todo_success').html(data.success);
            }
         }

       });   

    });

    // //Student Assesment-------------------------
    // $(document).on("click",".student_assesment",function() {
    //   var student_id=$(this).val();
    //   //alert(student_id);
    //   if ($(this).is(':checked')) 
    //     {
    //         var action = 'checked';
    //      }
    //      else{
    //         var action = 'unchecked';
    //      }
    //   $.ajax({
    //     type: "POST",
    //     url: "",
    //     headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     async: false,
    //     data: {
    //       "action":action,
    //       'student_id':student_id
    //     },
    //     dataType: 'json',
    //     success: function(data){

    //     }
    //    });
    // })

  });
  </script>
@endsection