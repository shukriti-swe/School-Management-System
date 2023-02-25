@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Assignment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assignment</li>
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
          <div class="col-md-6">
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">New Assignments</h3>
               </div> 
                <div class="card-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         
                        <th>Title</th>
                        <th> Read </th>
                        <th style="width: 40px"> Complete </th>
                        <th>Comment</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($assignments as $assignment)
                      <tr>
                        
                        <td>{{$assignment['title']}}</td>
                        <td style="text-align: center;">
                          <input type="checkbox" name="markasred1" class="assignment_read" data-id="<?=$assignment['id']?>" <?php if(!empty($assignment['assinmentdetails'])){ if($assignment['assinmentdetails']['read_status']==1){echo "checked";}}?>>
                        </td>
                        <td style="text-align: center;"> 
                          <input type="checkbox" name="markascomplete1"  class="assignment_comment" data-id="<?=$assignment['id']?>" <?php if(!empty($assignment['assinmentdetails'])){ if($assignment['assinmentdetails']['comment_status']==1){echo "checked";}}?>>
                        </td>
                        <td>
                          <a href="javascript:" type="button" class="open_chat" data-id="<?=$assignment['id']?>">
                            <span class="btn btn-sm btn-warning">
                              <i class="fas fa-file-pdf"></i> 
                            </span> 
                          </a>
                        </td>
                      </tr>
                    @endforeach
                       
                    </tbody>
                  </table>
                </div> 
            </div> 
          </div>
          
          <div class="col-md-6">
            <div class="card card-warning">
               <div class="card-header">
                  <h3 class="card-title">Past Assignments</h3>
               </div> 
                <div class="card-body table-responsive">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         
                        <th>Class</th>
                        <th> Read </th>
                        <th style="width: 40px"> Complete </th>
                        <th>Comment</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($finish_assignment as $f_assignment)
                      <tr>
                        
                        <td>Class 5</td>
                        <td style="text-align: center;">
                          <input type="checkbox" name="markasred1" class="assignment_read" data-id="<?=$f_assignment['id']?>" <?php if(!empty($f_assignment['assinmentdetails'])){ if($f_assignment['assinmentdetails']['read_status']==1){echo "checked";}}?>>
                        </td>
                        <td style="text-align: center;"> 
                          <input type="checkbox" name="markascomplete1"  class="assignment_comment" data-id="<?=$f_assignment['id']?>" <?php if(!empty($f_assignment['assinmentdetails'])){ if($f_assignment['assinmentdetails']['comment_status']==1){echo "checked";}}?>>
                        </td>
                        <td>
                          <a href="#">
                            <span class="btn btn-sm btn-warning">
                              <i class="fas fa-file-pdf"></i> 
                            </span> 
                          </a>
                        </td>
                      </tr>
                    @endforeach
                       
                    </tbody>
                  </table>
                </div> 
            </div> 
          </div> 
        </div>




        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="chatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
        <div class="modal-body">
         <!-- /.card-header -->
         <div class="card-body">
                      <textarea class="form-control descriptioncontent" id="comment"></textarea>
                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages right">

                      </div>
                      
                      <!--/.direct-chat-messages-->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <form action="#" method="post">
                        <div class="input-group">
                          <input type="text" name="message" placeholder="Type Message ..." class="form-control comment_box">
                          <span class="input-group-append">
                            <button type="button" class="btn btn-primary" id="send_comment">Send</button>
                          </span>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-footer-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
        </div>
 
    </div>
  </div>
</div>

  <script>
    $(document).ready(function() {

        $('.assignment_read').click(function() {
          if($(this).is(":checked")){
            var read = 1;
          }else{
            var read = 2;
          }
          var student_id = <?=$student['user_id']?>;
          var assignment_id = $(this).attr("data-id");
          //alert(student_id);
          $.ajax({
            url: "{{ route('student.save_read_assignment') }}",
            headers: {   
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {read: read,student_id:student_id,assignment_id:assignment_id},
            dataType: 'json',
            success: function(data) {

              // if(data==1){
              //   alert("Read Status Added");
              // }

            }
          });

        });

        $('.assignment_comment').click(function() {
          if($(this).is(":checked")){
            var comment = 1;
          }else{
            var comment = 2;
          }
          var student_id = <?=$student['user_id']?>;
          var assignment_id = $(this).attr("data-id");
          //alert(student_id);
          $.ajax({
            url: "{{ route('student.save_comment_assignment') }}",
            headers: {   
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {comment: comment,student_id:student_id,assignment_id:assignment_id},
            dataType: 'json',
            success: function(data) {

              // if(data==1){
              //   alert("Read Status Added");
              // }

            }
          });

        });

        $('.open_chat').click(function() {
          $("#chatmodal").modal('show');

          var assignment_id = $(this).attr("data-id");
          $.ajax({
            url: "{{ route('student.getComment') }}",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {assignment_id:assignment_id},
            dataType: 'json',
            success: function(data) {
            
            var html = '';
            var assignment = data.getMessage;
            var student = data.student;
            var trainer = data.trainer;
            console.log(assignment);
            // console.log(student);
            // console.log(assignment);
            // alert(assignment_id);

            for(var i=0;i<assignment.length;i++){
              $("#comment").val(assignment[i].get_assignment.comment);
              
              if(assignment[i].reciever_id ==student.id){
                var css = 'background-color: #d2d6de;border: 1px solid #d2d6de;color: #444';
                var name = trainer.trainer_name;
                var image = "{{url('/image/trainer')}}/"+trainer.image;
                
              }else{
                var css = 'background-color: #007bff;border-color: #007bff;color: #fff;';
                var name = student.name;
                var image = "{{url('')}}/"+student.image;
              }

              html += '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">'+name+'</span><span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span></div><img class="direct-chat-img" src="'+image+'" alt="user image"><div class="direct-chat-text" style="'+css+'">'+assignment[i].message+'</div></div>';

            }

            $("#send_comment").attr('data-id',assignment_id);
            $("#send_comment").attr('data-value',trainer.id);
            $("#send_comment").attr('data-index',student.id);
            $(".direct-chat-messages").html(html);
            }
          });
        });

        $("#send_comment").click(function(){
         var assignment_id = $(this).attr('data-id');
         var trainer_id = $(this).attr('data-value');
         var student_id = $(this).attr('data-index');
         var comment = $(".comment_box").val();

        //  alert(assignment_id);
        //  alert(trainer_id);
        //  alert(student_id);
        //  alert(comment);
          $.ajax({
          url: "{{ route('student.addComment') }}",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: "POST",
          data: {assignment_id:assignment_id,trainer_id:trainer_id,student_id:student_id,comment:comment},
          dataType: 'json',
          success: function(data) {

          console.log(data);

          var css = 'background-color: #007bff;border-color: #007bff;color: #fff;';
          var image = "{{url('')}}/"+data.student.image;

          html = '<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">'+data.student.name+'</span><span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span></div><img class="direct-chat-img" src="'+image+'" alt="user image"><div class="direct-chat-text" style="'+css+'">'+data.message+'</div></div>';

          $(".direct-chat-messages").append(html);
          $(".comment_box").val('');

          }
          });
        });
     
    });h       
  </script>
@endsection