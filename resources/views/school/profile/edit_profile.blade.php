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

            @if(session()->has('email_faild'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('email_faild') }}
            </div>
            @endif

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            @if(session()->has('csv_email_faild'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('csv_email_faild') }}
            </div>
            @endif

            @if(session()->has('csv_invalid_email'))
            <div class="alert alert-danger" style="text-align: center;">
                {{ session()->get('csv_invalid_email') }}
            </div>
            @endif
            
            <form action="{{route('school.update-school')}}" method="POST" enctype="multipart/form-data">
             @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                            <?php
                            $number_of_student = $school['number_of_student'] / 120;
                            $number_student = round($number_of_student);
                            ?>
                            <input type="hidden" value="{{$school['user_id']}}" name="user_id">
                            <input type="hidden" value="{{$school['id']}}" name="school_id">
                            <input type="hidden" value="{{$school['school_logo']}}" name="old_school_logo">
                            <input type="hidden" value="{{$school['school_cover_image']}}" name="old_cover_image">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="schoolname">{{__('admin.school_name')}}</label>
                                    <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="schoolname" name="school_name" value="{{$school['school_name']}}">
                                    @error('school_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="schoolname">{{__('admin.address')}}</label>
                                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="" name="address">{{$school['school_address']}}</textarea>
                                    @error('address')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="yearestablished">{{__('admin.year_established')}}</label>
                                    <input type="number" class="form-control @error('year_establish') is-invalid @enderror" id="yearestablished" placeholder="" min="0" name="year_establish" value="{{$school['year_establish']}}">
                                    @error('year_establish')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="schoolname">{{__('admin.number_of_student')}}</label>
                                    <input type="number" class="form-control @error('year_establish') is-invalid @enderror" placeholder="" name="number_of_student" value="{{$school['number_of_student']}}">
                                     @error('number_of_student')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label for="inchargename">{{__('admin.activity_in_charge_name')}}</label>
                                    <input type="text" class="form-control @error('incharge_name') is-invalid @enderror" id="inchargename" name="incharge_name" placeholder="" value="{{$school['incharge_name']}}">
                                    @error('incharge_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="yearestablished">official Email Id (principle)</label>
                                    <input type="email" class="form-control @error('official_email_id') is-invalid @enderror" id="yearestablished" placeholder="official Email Id" min="0" name="official_email_id" value="{{$school['official_email_id']}}">
                                    @error('official_email_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inchargeemail">{{__('admin.in_charge_email')}}</label>
                                    <input type="text" class="form-control @error('incharge_email') is-invalid @enderror" id="inchargeemail" name="incharge_email" placeholder="" value="{{$school['incharge_email']}}">
                                    @error('incharge_email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="inchargecontact">{{__('admin.in_charge_contact_number')}}</label>
                                    <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" id="phone" placeholder="contact number" min="0" name="contact_number" value="{{$school['contact_number']}}" default="bangladesh">
                                    @error('contact_number')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="partnername">Kidspreneurship Representative</label>
                                    <input type="text" class="form-control" id="partnername" name="partner_name" placeholder="" value="{{$school['kidspreneurship_representative']}}">
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
                                <label for="exampleInputFile">{{__('admin.school_logo')}}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="school_logo">
                                        <label class="custom-file-label" for="exampleInputFile">{{__('admin.choose_file')}}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__('admin.upload')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Upload School Cover Pictute</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="school_cover_image">
                                        <label class="custom-file-label" for="exampleInputFile">{{__('admin.choose_file')}}</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{__('admin.upload')}}</span>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label>Upload Excel </label>
                                <input type="file" name="upload_csv" accept=".csv">
                                <p><a href="{{asset('csv/template/student-information-template.csv')}}" class="text-danger">DOWNLOAD EXCEL FOR FORMAT</a></p>
                            </div>

                            <div class="form-group">
                                <label for="schoolname">{{__('admin.course_start_date')}}</label>
                                <input type="date" class="form-control" id="startdate" name="course_start_date" placeholder="" value="{{$school['course_start_date']}}">
                            </div>

                            <div class="form-group">
                                <label for="schoolname">Entrepreneurship Lab </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="entrepreneurship_lab" value="yes" @if($school['entrepreneurship_lab']=='yes' ) checked @endif>
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="entrepreneurship_lab" value="no" @if($school['entrepreneurship_lab']=='no' ) checked @endif>
                                    <label class="form-check-label">No</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="entrepreneurship_lab" value="later" @if($school['entrepreneurship_lab']=='later' ) checked @endif>
                                    <label class="form-check-label">Later</label>
                                </div>
                            </div>
                            <?php if (count($school['class_schedule']) > 0) { ?>
                                <label for="schoolname">Preferred Day</label>
                                @foreach($school['class_schedule'] as $schedule)
                                <div class="section_add_more_new">
                                    <div class="row_check_new1">
                                        <div class="row">
                                            <div class="col-3 mb-2">
                                                <select class="form-control" name="day[]">
                                                    <option value="">--select--</option>
                                                    <option value="6" @if($schedule['day']=='6' ) selected @endif>Saturday</option>
                                                    <option value="0" @if($schedule['day']=='0' ) selected @endif>Sunday</option>
                                                    <option value="1" @if($schedule['day']=='1' ) selected @endif>Monday</option>
                                                    <option value="2" @if($schedule['day']=='2' ) selected @endif>Tuesday</option>
                                                    <option value="3" @if($schedule['day']=='3' ) selected @endif>Wednesday</option>
                                                    <option value="4" @if($schedule['day']=='4' ) selected @endif>Thursday</option>
                                                    <option value="5" @if($schedule['day']=='5' ) selected @endif>Friday</option>
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <select class="form-control" name="grade[]">
                                                <option value="">--select--</option>
                                                @foreach($grade as $grades)
                                                <option value="{{$grades->id}}" @if($schedule['grade'] == $grades->id) selected @endif >{{$grades->grade}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3 mb-2">
                                                <input type="time" class="form-control" name="start_time[]" value="{{$schedule['start_time']}}">
                                            </div>
                                            <div class="col-3 mb-2">
                                                <input type="time" class="form-control" name="end_time[]" value="{{$schedule['end_time']}}">

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <span type="button" class="ms-2 badge badge-info addBtn1"> Add more time</span>
                                            <span class="btn btn-danger btn-sm removeBtn1 d-inline">Remove</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <?php } else {
                                for ($i = 1; $i <= $number_student; $i++) {
                                ?>
                                    <label for="schoolname">Preferred Day </label>
                                    <div class="section_add_more_new">
                                        <div class="row_check_new1">
                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <select class="form-control" name="day[]">
                                                        <option value="">--select--</option>
                                                        <option value="6">Saturday</option>
                                                        <option value="0">Sunday</option>
                                                        <option value="1">Monday</option>
                                                        <option value="2">Tuesday</option>
                                                        <option value="3">Wednesday</option>
                                                        <option value="4">Thursday</option>
                                                        <option value="5">Friday</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 mb-2">
                                                    <select class="form-control" name="grade[]">
                                                    <option value="">--select--</option>
                                                    @foreach($grade as $grades)
                                                    <option value="{{$grades->id}}">{{$grades->grade}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3 mb-2">
                                                    <input type="time" class="form-control" name="start_time[]" value="">
                                                </div>
                                                <div class="col-3 mb-2">
                                                    <input type="time" class="form-control" name="end_time[]" value="">

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <span type="button" class="ms-2 badge badge-info addBtn1"> Add more time</span>
                                                <span class="btn btn-danger btn-sm removeBtn1 d-inline">Remove</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                            <!-- <div class="form-group">
                                <label for="package">Enquiry Message:</label>
                                <textarea class="form-control" placeholder="Write Enquiry Message"></textarea>
                            </div> -->
                            <div class="form-group text-center">
                                <label for="package">Remarks – Yearly fee for 320 students paid</label>
                                <label>Renewal Due on June 10, 2023 </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>

</script>

@endsection