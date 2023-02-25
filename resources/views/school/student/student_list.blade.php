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

    @if(Session::has('message'))
      <div class="alert alert-success">
          {{ Session::get('message') }}
      </div>
    @endif
    
    @if(Session::has('message1'))
      <div class="alert alert-danger">
          {{ Session::get('message1') }}
      </div>
    @endif
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="card"> 
          <div class="card-header"> 
            <div class="card-tools">
              <select class="form-control" id="select_grade">
                <option value="">---Select Grade---</option>
                @foreach($grades as $key=>$all_grade)
                  <option value="{{$all_grade['getgrades'][0]['id']}}">{{$all_grade['getgrades'][0]['grade']}}</option>
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
                <th>Assignment</th>
                <th>Projects</th>
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
<script>
    $( document ).ready(function() { 
    
      var table=$('#example_new').DataTable( {
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{route('school.student_list_datatable')}}",
            type: "get",
            dataType: 'JSON',
            data: function (d) {
               d.grade_id = $('#select_grade').val()
            }
        },
       columns: [
                { data: 'std_user.name', name: 'std_user.name' },
                { data: 'school.school_name', name: 'school.school_name' },
                { data: 'overal_grade', name: 'overal_grade' },
                { data: 'grade_id', name: 'grade_id' },
                { data: 'assignment', name: 'assignment'},
                { data: 'projects', name: 'projects'},
                {data:'action',name:'action',orderable:true, searchable:true},
                ],
        
    });

    $('#select_grade').change(function(){
        table.draw();
    });

    

    });
</script>
  
@endsection