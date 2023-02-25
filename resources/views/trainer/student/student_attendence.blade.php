@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance  List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance List</li>
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
                <h4 class="text-muted">You are managing 40 students</h4>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select School</label>
                      <select class="form-control" id="school_id">
                        <option value="">---Select One---</option>
                        <?php foreach($schools as $school){ ?>
                        <option value="<?=$school['get_school']['id']?>"><?=$school['get_school']['school_name']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Select Grade/Batch</label>
                      <select class="form-control" id="grade_id">
                        <option value="">---Select One---</option>
                        <?php foreach($grades as $grade){ ?>
                        <option value="<?=$grade['id']?>"><?=$grade['grade']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Quater</label>
                      <select class="form-control" id="quarter">
                        <option value="">---Select One---</option>
                        <option value="1">L1</option>
                        <option value="2">L2</option>
                        <option value="3">L3</option>
                        <option value="4">L4</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">

                <table id="example11" class="table table-bordered table-striped">
                  <thead>
                  <tr cl>
                    <th>Name</th> 
                    <?php for($a=1;$a<=13;$a++){?>
                    <th>Session<?=$a?></th>
                    <?php }?>
                    <th>Percentage</th>
                  </tr>
                  </thead>
                  <tbody id="tbody1">
                  </tbody>
                 </table>

                 <table id="example22" class="table table-bordered table-striped" style="display: none;">
                  <thead>
                  <tr cl>
                    <th>Name</th> 
                    <?php for($b=14;$b<=26;$b++){?>
                    <th>Session<?=$b?></th>
                    <?php }?>
                    <th>Percentage</th>
                  </tr>
                  </thead>
                  <tbody id="tbody2">
                  </tbody>
                 </table>
                 
                 
                 <table id="example3" class="table table-bordered table-striped" style="display: none;">
                  <thead>
                  <tr cl>
                    <th>Name</th> 
                    <?php for($c=27;$c<=39;$c++){?>
                    <th>Session<?=$c?></th>
                    <?php }?>
                    <th>Percentage</th>
                  </tr>
                  </thead>
                  <tbody id="tbody3">
                  </tbody>
                 </table>

                 <table id="example4" class="table table-bordered table-striped" style="display: none;">
                  <thead>
                  <tr cl>
                    <th>Name</th> 
                    <?php for($d=40;$d<=52;$d++){?>
                    <th>Session<?=$d?></th>
                    <?php }?>
                    <th>Percentage</th>
                  </tr>
                  </thead>
                  <tbody id="tbody4">
                  </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="schoolError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <h4 style="text-align: center;">Please select School</h4>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
  </div>

  <div class="modal fade" id="gradeError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <h4 style="text-align: center;">Please select Grade</h4>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="quaterError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <h4 style="text-align: center;">Please select Quater</h4>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $("#school_id").change(function(){
         var quater = $("#quarter").val();
         var school_id = $('#school_id').val();
         var grade_id = $('#grade_id').val();
         common(school_id,grade_id,quater);  
      });

      $("#grade_id").change(function(){
          var quater = $("#quarter").val();
          var school_id = $('#school_id').val();
          var grade_id = $('#grade_id').val();
          common(school_id,grade_id,quater);  
      });

      $("#quarter").change(function(){
          var quater = $("#quarter").val();
          var school_id = $('#school_id').val();
          var grade_id = $('#grade_id').val();
          common(school_id,grade_id,quater);        
      });

     
      $(document).on('click','.chk_present',function(){
        var class_no = $(this).val();
        var student_id = $(this).attr('data-value');
        var class_id = $(this).attr('data-index');
        if ($(this).is(':checked')) {
          var attend_status = 1;
        }else{
          var attend_status = 2;
        }
        $.ajax({
            url: "{{ route('trainer.saveAttendance') }}",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {student_id:student_id,class_no:class_no,attend_status:attend_status},
            dataType: 'json',
            success: function(data) {
              if(data.status==2){

                 $('.chk_class_a'+class_id).prop('checked', false); 
              }
            }
            });

      });

      $(document).on('click','.chk_absent',function(){
        var class_no = $(this).val();
        var student_id = $(this).attr('data-value');
        var class_id = $(this).attr('data-index');
        if ($(this).is(':checked')) {
          var attend_status = 2;
        }else{
          var attend_status = 1;
        }
        $.ajax({
            url: "{{ route('trainer.saveAttendance') }}",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {student_id:student_id,class_no:class_no,attend_status:attend_status},
            dataType: 'json',
            success: function(data) {
              if(data.status==2){

              $('.chk_class_p'+class_id).prop('checked', false); 
              }
            }
            });

      });

    });

    function common(school_id,grade_id,quater){
        if(school_id=='' || grade_id=='' || quater==''){
           if(school_id==''){
            $('#schoolError').modal('show');
           }
           if(grade_id=='' && school_id!=''){
            $('#gradeError').modal('show');
           }
           if(grade_id!='' && school_id!='' && quater==''){
            $('#quaterError').modal('show');
           }
        }else{
          if(quater==1){
          $('#example11').show();
          $('#example22').hide();
          $('#example3').hide();
          $('#example4').hide();

          getStudent(school_id,grade_id,quater);

          }else if(quater==2){
          $('#example11').hide();
          $('#example22').show();
          $('#example3').hide();
          $('#example4').hide();

          getStudent(school_id,grade_id,quater);

          }else if(quater==3){
          $('#example11').hide();
          $('#example22').hide();
          $('#example3').show();
          $('#example4').hide();

          getStudent(school_id,grade_id,quater);

          }else if(quater==4){
          $('#example11').hide();
          $('#example22').hide();
          $('#example3').hide();
          $('#example4').show();

          getStudent(school_id,grade_id,quater);

          }
        } 
    }

    function getStudent(school_id,grade_id,quater){

          $.ajax({
            url: "{{ route('trainer.getStudent') }}",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: {school_id:school_id,grade_id:grade_id},
            dataType: 'json',
            success: function(data) {
              //console.log(data);
              var students = data.students;
              var attendance = data.attendance;
              var html = '';
              // var p_checked = '';
              // var a_checked = '';
              if(students!=''){

              for(var i=0;i<students.length;i++){
                var class_no=i+1;
                present_status = '';
                
                if(quater==1){
                  for(var a=1;a<=13;a++){
                    if(attendance[i].length>0){
                      var attends = attendance[i];
                      var p_checked = '';
                      var a_checked = '';
                      for(var x=0;x<attends.length;x++){
                        //x= x+1;
                        
                        // alert(attends[x].class_no)
                        if(attends[x].class_no == a){
                          if(attends[x].attend_status==1){
                            p_checked = 'checked';
                          }
                          if(attends[x].attend_status==2){
                            a_checked = 'checked';
                          }
                        }
                      }
                    }
                    present_status += '<td class="class'+a+students[i].id+'" data-id="'+a+'">P <input type="checkbox" value="'+a+'" class="chk_class_p'+a+students[i].id+' chk_present" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'" '+p_checked+'><br> A <input type="checkbox" value="'+a+'" class="chk_class_a'+a+students[i].id+' chk_absent" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'"'+a_checked+'></td>';
                  }
                }else if(quater==2){
                  for(var a=14;a<=26;a++){
                    if(attendance[i].length>0){
                      var attends = attendance[i];
                      var p_checked = '';
                      var a_checked = '';
                      for(var x=0;x<attends.length;x++){
                        //x= x+1;
                        
                        // alert(attends[x].class_no)
                        if(attends[x].class_no == a){
                          if(attends[x].attend_status==1){
                            p_checked = 'checked';
                          }
                          if(attends[x].attend_status==2){
                            a_checked = 'checked';
                          }
                        }
                      }
                    }
                    present_status += '<td class="class'+a+students[i].id+'" data-id="'+a+'">P <input type="checkbox" value="'+a+'" class="chk_class_p'+a+students[i].id+' chk_present" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'" '+p_checked+'><br> A <input type="checkbox" value="'+a+'" class="chk_class_a'+a+students[i].id+' chk_absent" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'"'+a_checked+'></td>';
                  }
                }else if(quater==3){
                  for(var a=27;a<=39;a++){
                    if(attendance[i].length>0){
                      var attends = attendance[i];
                      var p_checked = '';
                      var a_checked = '';
                      for(var x=0;x<attends.length;x++){
                        //x= x+1;
                        
                        // alert(attends[x].class_no)
                        if(attends[x].class_no == a){
                          if(attends[x].attend_status==1){
                            p_checked = 'checked';
                          }
                          if(attends[x].attend_status==2){
                            a_checked = 'checked';
                          }
                        }
                      }
                    }
                    present_status += '<td class="class'+a+students[i].id+'" data-id="'+a+'">P <input type="checkbox" value="'+a+'" class="chk_class_p'+a+students[i].id+' chk_present" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'" '+p_checked+'><br> A <input type="checkbox" value="'+a+'" class="chk_class_a'+a+students[i].id+' chk_absent" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'"'+a_checked+'></td>';
                  }
                }else if(quater==4){
                  for(var a=40;a<=52;a++){
                    if(attendance[i].length>0){
                      var attends = attendance[i];
                      var p_checked = '';
                      var a_checked = '';
                      for(var x=0;x<attends.length;x++){
                        //x= x+1;
                        
                        // alert(attends[x].class_no)
                        if(attends[x].class_no == a){
                          if(attends[x].attend_status==1){
                            p_checked = 'checked';
                          }
                          if(attends[x].attend_status==2){
                            a_checked = 'checked';
                          }
                        }
                      }
                    }
                    present_status += '<td class="class'+a+students[i].id+'" data-id="'+a+'">P <input type="checkbox" value="'+a+'" class="chk_class_p'+a+students[i].id+' chk_present" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'" '+p_checked+'><br> A <input type="checkbox" value="'+a+'" class="chk_class_a'+a+students[i].id+' chk_absent" data-value="'+students[i].id+'" data-index="'+a+students[i].id+'"'+a_checked+'></td>';
                  }
                }
                html +='<tr><td>'+students[i].name+'</td>'+present_status+'<td> 57% </td></tr>';
              }
              }
              if(quater==1){
                $('#tbody1').html(html);
              }else if(quater==2){
                $('#tbody2').html(html);
              }else if(quater==3){
                $('#tbody3').html(html);
              }else if(quater==4){
                $('#tbody4').html(html);
              }

            }
          });

    }
  </script>

@endsection