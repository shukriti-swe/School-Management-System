@extends('backend.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student Progress Report </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student Progress Report </li>
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
          <div class="sticky-top mb-2">
            <div class="card card-default">
              <div class="card-header">
                You have 320 students from your school pursuing Entrepreneurship Course
              </div>

              <select class="form-control" id="grades">
                  <?php foreach($grades as $grade){ ?>
                  <option value="<?=$grade['id']?>"><?=$grade['grade']?></option>
                  <?php }?>
              </select>
              <br>

              <div class="card-body table-responsive p-0" style="max-height:535px;overflow-y: scroll;">
                <table class="table table-striped table-valign-middle">
                  <tbody id="student_list">
                    @foreach($students as $student)
                    <tr>
                      <td>
                        <a href="#" class="student_info" data-id="{{ $student->id }}">

                          @if($student->image != 'no_image')
                            <img src="{{ asset($student->image) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            {{ $student->user->name }} <br>
                          @else
                            <img src="{{ asset('img/default_image.png') }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            {{ $student->user->name }} <br>
                          @endif

                        </a>
                        <p style="font-size: 11px; margin-left: 45px">
                          <span class="info-box-text">Grade</span>
                          <span class="info-box-number">{{ $student->grade_id }} th</span>
                        </p>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-9 student_information">
        </div>


      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
  $( document ).ready(function() {
      $("#grades").change(function(){
        var grade_id = $(this).val();
        $.ajax({
        type: "POST",
        url: "{{ route('school.getProgressByGrade') }}",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {grade_id: grade_id},
        dataType: 'json',
        success: function(data) {

          var html ='';

          for(var i=0;i<data.length;i++){
            var image = data[i].image;
            if(image!='no_image'){
              var with_image = "{{url('')}}/"+image;
              var gethtml = '<img src="'+with_image+'" alt="Product 1" class="img-circle img-size-32 mr-2">'+data[i].user['name']+'<br>';
            }else{
              var without_image = "{{url('')}}/img/default_image.png";
              var gethtml = '<img src="'+without_image+'" alt="Product 1" class="img-circle img-size-32 mr-2">'+data[i].user['name']+'<br>';
            }
            html += '<tr><td><a href="#" class="student_info" data-id="'+data[i].id+'">'+gethtml+'</a><p style="font-size: 11px; margin-left: 45px"><span class="info-box-text">Grade</span><span class="info-box-number">'+data[i].grade_id+' th</span></p></td></tr>';
          }
          $("#student_list").html(html);
        }
        });
      });
  });

  function automaticAjaxCall(){
     var studentId = $('.student_info').attr('data-id');

      $.ajax({
        type: "POST",
        url: "{{ route('school.student-info') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          studentId: studentId
        },
        dataType: 'json',
        success: function(data) {
          
            var html = '';
            var assignment = '';
            for(var i=0; i<data.assignmentfiles.length; i++)
            {
              var j = i + 1;
              var base_url = $('meta[name="base_url"]').attr('content');
              var url = base_url+'/'+data.assignmentfiles[i].attachment;
              assignment+= '<li class="nav-item"><a href="'+url+'" target="_blank" class="nav-link"><span class="btn btn-sm btn-warning"><i class="fas fa-file-pdf"></i></span>  Assignment '+j+'</a></li>';
            }

            var project = '';
            for(var i=0; i<data.projectfiles.length; i++)
            {
              var k = i + 1;
              var base_url = $('meta[name="base_url"]').attr('content');
              var url = base_url+'/'+data.projectfiles[i].attachment;
              project+= '<li class="nav-item"><a href="'+url+'" target="_blank" class="nav-link"><span class="btn btn-sm btn-danger"><i class="fas fa-file-image"></i></span>  Project '+k+'</a></li>';
            }


                html+='<div class="card card-info"><div class="card-body"><div class="row"><div class="col-md-6"><div class="info-box mb-3 bg-success"><div class="info-box-content"><span class="info-box-text">Name of the Student</span><span class="info-box-number">'+data.user.name+'</span></div></div></div><div class="col-md-6"><div class="info-box mb-3 bg-info"><div class="info-box-content"><span class="info-box-text">Grade</span><span class="info-box-number">'+data.grade_id+' th</span></div></div></div></div><div class="row"><div class="col-md-6"><div class="card card-info"><div class="card-header">Projects involved in</div><div class="card-body" style="max-height: 250px;overflow-y: auto;"><ul class="nav flex-column">'+project+'</ul></div></div><div class="card card-primary"><div class="card-header">Assignment Submitted</div><div class="card-body" style="max-height: 250px;overflow-y: auto;"><ul class="nav flex-column">'+assignment+'</ul></div></div></div><div class="col-md-6"><div class="row"><div class="col-md-6"><div class="info-box mb-3 bg-primary"><div class="info-box-content"><span class="info-box-text">Classes Held</span><span class="info-box-number">'+data.classes_held+'</span></div></div></div><div class="col-md-6"><div class="info-box mb-3 bg-danger"><div class="info-box-content"><span class="info-box-text">Classes Attended</span><span class="info-box-number">'+data.classes_attended+'</span></div></div></div></div><div class="info-box"><span class="info-box-icon bg-warning"><i class="far fa-star"></i></span><div class="info-box-content"><span class="info-box-text">Overall Grade</span><span class="info-box-number">'+data.overal_grade+'<sup>+</sup></span></div></div><div class="card card-outline card-primary"><div class="card-header"><h3 class="card-title">Comments/Feedback </h3></div><div class="card-body"><ul><li>Good Need to more improve (Alex Broad)</li><li>More improvement needed (Donald Tramp)</li></ul></div></div><div class="card card-outline card-success"><div class="card-header"><h3 class="card-title">Assessment Parameters</h3></div><div class="card-body"><ul><li><a href="#">Emotional Quotient (EQ)-1-10</a></li><li><a href="#">Intelligence Quotient (IQ)-1-10</a></li><li><a href="#">Creative & Critical Thinking Quotient (CQ)-1-10</a></li><li><a href="#">Adversity Quotient (AQ)-1-10</a></li><li><a href="#">Social Quotient (SQ) -1-10</a></li><li><a href="#">Entrepreneurship Quotient (EnQ)– 1-10</a></li></ul></div></div></div><div class="col-md-12"><div class="card card-warning"><div class="card-header">Note By Entrepreneurship Coach</div><div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</div></div></div></div></div>';

            $('.student_information').html(html);


        }
      });
  }

  $(function() {

    automaticAjaxCall();
    $(document).on("click",".student_info",function() {
      var studentId = $(this).attr('data-id');

      $.ajax({
        type: "POST",
        url: "{{ route('school.student-info') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          studentId: studentId
        },
        dataType: 'json',
        success: function(data) {
          
            var html = '';
            var assignment = '';
            for(var i=0; i<data.assignmentfiles.length; i++)
            {
              var j = i + 1;
              var base_url = $('meta[name="base_url"]').attr('content');
              var url = base_url+'/'+data.assignmentfiles[i].attachment;
              assignment+= '<li class="nav-item"><a href="'+url+'" target="_blank" class="nav-link"><span class="btn btn-sm btn-warning"><i class="fas fa-file-pdf"></i></span>  Assignment '+j+'</a></li>';
            }

            var project = '';
            for(var i=0; i<data.projectfiles.length; i++)
            {
              var k = i + 1;
              var base_url = $('meta[name="base_url"]').attr('content');
              var url = base_url+'/'+data.projectfiles[i].attachment;
              project+= '<li class="nav-item"><a href="'+url+'" target="_blank" class="nav-link"><span class="btn btn-sm btn-danger"><i class="fas fa-file-image"></i></span>  Project '+k+'</a></li>';
            }


                html+='<div class="card card-info"><div class="card-body"><div class="row"><div class="col-md-6"><div class="info-box mb-3 bg-success"><div class="info-box-content"><span class="info-box-text">Name of the Student</span><span class="info-box-number">'+data.user.name+'</span></div></div></div><div class="col-md-6"><div class="info-box mb-3 bg-info"><div class="info-box-content"><span class="info-box-text">Grade</span><span class="info-box-number">'+data.grade_id+' th</span></div></div></div></div><div class="row"><div class="col-md-6"><div class="card card-info"><div class="card-header">Projects involved in</div><div class="card-body" style="max-height: 250px;overflow-y: auto;"><ul class="nav flex-column">'+project+'</ul></div></div><div class="card card-primary"><div class="card-header">Assignment Submitted</div><div class="card-body" style="max-height: 250px;overflow-y: auto;"><ul class="nav flex-column">'+assignment+'</ul></div></div></div><div class="col-md-6"><div class="row"><div class="col-md-6"><div class="info-box mb-3 bg-primary"><div class="info-box-content"><span class="info-box-text">Classes Held</span><span class="info-box-number">'+data.classes_held+'</span></div></div></div><div class="col-md-6"><div class="info-box mb-3 bg-danger"><div class="info-box-content"><span class="info-box-text">Classes Attended</span><span class="info-box-number">'+data.classes_attended+'</span></div></div></div></div><div class="info-box"><span class="info-box-icon bg-warning"><i class="far fa-star"></i></span><div class="info-box-content"><span class="info-box-text">Overall Grade</span><span class="info-box-number">'+data.overal_grade+'<sup>+</sup></span></div></div><div class="card card-outline card-primary"><div class="card-header"><h3 class="card-title">Comments/Feedback </h3></div><div class="card-body"><ul><li>Good Need to more improve (Alex Broad)</li><li>More improvement needed (Donald Tramp)</li></ul></div></div><div class="card card-outline card-success"><div class="card-header"><h3 class="card-title">Assessment Parameters</h3></div><div class="card-body"><ul><li><a href="#">Emotional Quotient (EQ)-1-10</a></li><li><a href="#">Intelligence Quotient (IQ)-1-10</a></li><li><a href="#">Creative & Critical Thinking Quotient (CQ)-1-10</a></li><li><a href="#">Adversity Quotient (AQ)-1-10</a></li><li><a href="#">Social Quotient (SQ) -1-10</a></li><li><a href="#">Entrepreneurship Quotient (EnQ)– 1-10</a></li></ul></div></div></div><div class="col-md-12"><div class="card card-warning"><div class="card-header">Note By Entrepreneurship Coach</div><div class="card-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</div></div></div></div></div>';

            $('.student_information').html(html);


        }
      });
    });

  });
</script>




@endsection