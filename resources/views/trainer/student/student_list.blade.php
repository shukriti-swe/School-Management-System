@extends('backend.layouts.app')

@section('content')

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
        <div class="card"> 
          <div class="card-header"> 
            <div class="card-tools">
              <select class="form-control" id="select_grade">
                <option value="">---Select Grade---</option>
                @foreach($grade as $grades)
                   <option value="{{$grades['id']}}">{{$grades['grade']}}</option>
                @endforeach
              </select>
            </div>

            <div class="card-tools mr-2">
              <select class="form-control" id="select_school">
                <option value="">---Select School---</option>
                @foreach($school as $schools)
                    <option value="{{$schools['id']}}">{{$schools['school_name']}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example_new" class="table table-bordered table-striped">  
              <thead>
              <tr> 
                <th>Name</th> 
                <th>School</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
            
              </tbody>
             </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Approve Modal -->
  <div class="modal fade" id="approve_modal" role="dialog" tabindex="-1" aria-labelledby="approve_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
        	<input type="hidden" name="advertisements_id" id="approve_advertisement_id" value="">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Confirm Approve</h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
             <form action="" id="approve_project_submit">
                <p>Are You Sure You Want To Approve This?</p>
                <div class="approve_data">
                    
                </div> 
                <div class="text-right">   
                  <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
                    <button type="button" class="btn btn-success btn-sm approve_project" id="" value="">Approve</button>
                </div>
             </form>
          </div>
    </div>
   </div>
  </div>
  <!-- End Approve Modal -->

  <!-- Reject Modal -->
  <div class="modal fade" id="reject_modal" role="dialog" tabindex="-1" aria-labelledby="approve_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
        	<input type="hidden" name="advertisements_id" id="reject_advertisement_id" value="">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Confirm Reject</h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
              <form action="" id="reject_project_submit">
              <p>Are You Sure You Want To Reject This?</p>
                <div class="approve_data">
                    
                </div> 
                <div class="text-right">   
                  <button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
                    <button type="button" class="btn btn-success btn-sm reject_project" id="" value="">Reject</button>
                </div>
              </form>
            </div>
           
        </div>
    </div>
 </div>
 <!-- End Reject Modal -->
  <script>
  $( document ).ready(function() {  

    var table=$('#example_new').DataTable( {
        //order: [[ 0, 'DESC']],
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('trainer.student_list_datatable')}}",
            type: "get",
            dataType: 'JSON',
            data: function (d) {

                d.school_id = $('#select_school').val(),
                d.grade_id = $('#select_grade').val()
            }
        },
       columns: [
                { data: 'std_user.name', name: 'std_user.name' },
                { data: 'school.school_name', name: 'school.school_name' },
                { data: 'overal_grade', name: 'overal_grade' },
                { data: 'grade_id', name: 'grade_id' },
                {data:'action',name:'action',orderable:true, searchable:true},
                ]

  
    });

    $('#select_school').change(function(){
        table.draw();
    });
    $('#select_grade').change(function(){
        table.draw();
    });

    //Approve project------------------------------------
    $(document).on("click","#approve_project",function() {
        $('#approve_modal').modal('show');
        var student_id=$(this).attr('data-id');
        $.ajax({
        url: "{{route('trainer.project_approve')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        async: false,
        data: {
          'student_id':student_id
        },
        dataType: 'JSON',
        success: function(data) {
           
           console.log(data);
            var i;
            var html='';
          if(data.getproject.length != 0)
          {
      
            for(i=0; i<data.getproject.length; i++)
            {
              //console.log(data.getproject[i].title);
              html+='<div class="form-group"><label for="assessmentdone"></label><input type="checkbox" name="project_approve[]" class="checkBox" id="assessmentdone" value="'+data.getproject[i].id+'"> '+data.getproject[i].title+'</div>';
            }
            $('.approve_data').html(html);

          }
          else
          {
            $('.approve_data').html('No data found');
          }
          }  
      });
        
    });
    
 });

 //From submit------------
    $('.approve_project').click(function(e){
      
      var custom_data = $('#approve_project_submit').serialize();
      $.ajax({
        type: "POST",
        url: "{{route('trainer.approve_project_submit')}}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        data: custom_data,
        dataType: 'json',
        success: function(data){
          //console.log(data);
          if(data.success)
          {
            $('#approve_modal').modal('hide');
            alert('Successfully Project Approve');
          }
        }
       });
    });

    //Reject Project------------------------
    $(document).on("click","#reject_project",function() {
      $('#reject_modal').modal('show');
      var student_id=$(this).attr('data-id');
        $.ajax({
        url: "{{route('trainer.project_approve')}}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        async: false,
        data: {
          'student_id':student_id
        },
        dataType: 'JSON',
        success: function(data) {
           
           console.log(data);
            var i;
            var html='';
          if(data.getproject.length != 0)
          {
      
            for(i=0; i<data.getproject.length; i++)
            {
              //console.log(data.getproject[i].title);
              html+='<div class="form-group"><label for="assessmentdone"></label><input type="checkbox" name="project_approve[]" class="checkBox" id="assessmentdone" value="'+data.getproject[i].id+'"> '+data.getproject[i].title+'</div>';
            }
            $('.approve_data').html(html);

          }
          else
          {
            $('.approve_data').html('No data found');
          }
          }  
       });

    //From submit------------
    $('.reject_project').click(function(e){
      var custom_data = $('#reject_project_submit').serialize();
      $.ajax({
        type: "POST",
        url: "{{route('trainer.reject_project_submit')}}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        data: custom_data,
        dataType: 'json',
        success: function(data){
          //console.log(data);
          if(data.success)
          {
            $('#reject_modal').modal('hide');
            alert('Successfully Reject Approve')

          }
        }
       });
     });

    });
  </script>
@endsection