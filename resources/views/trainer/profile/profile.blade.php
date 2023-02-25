@extends('backend.layouts.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @if(session()->has('update_success'))
                  <div class="alert alert-success" style="text-align: center;">
                      {{ session()->get('update_success') }}
                  </div>
              @endif
        <form action="{{route('trainer.profile_update')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$datas['trainer']->id}}">
         <input type="hidden" name="user_id" value="{{$datas['trainer']->user_id}}">

          <div class="card">
            <div class="card-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trainer Full Name</label>
                    <input type="text" class="form-control" name="trainer_name" value="{{$datas['trainer']->trainer_name}}">
                    @error('trainer_name')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trainer Address</label>
                    <input type="text" class="form-control" name="address" value="{{$datas['trainer']->address}}">
                    @error('address')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Trainer City</label>
                    <input type="text" class="form-control" name="city" value="{{$datas['trainer']->city}}">
                    @error('city')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Joining Date</label>
                    <input type="date" class="form-control" name="join_date" value="{{$datas['trainer']->join_date}}">
                    @error('join_date')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{$datas['trainer']->date_of_birth}}">
                    @error('date_of_birth')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Official Email Id</label>
                    <input type="text" class="form-control" name="official_email_id" value="{{$datas['trainer']->official_email_id}}">
                    @error('official_email_id')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
   
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" id="phone" name="contact_no"  value="{{$datas['trainer']->contact_no}}">
                    @error('contact_no')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Upload Identity Proof</label><br>
                    <input type="file" class="form-control" id="" name="image">
                    <input type="hidden" name="pre_image" value="{{$datas['trainer']->image}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mode</label>
                    <select class="form-control" name="mode">
                           <option value="1" <?php if ($datas['trainer']->mode == 1) {
                                                echo "selected";
                                             } ?>>Online</option>
                           <option value="2" <?php if ($datas['trainer']->mode == 2) {
                                                echo "selected";
                                             } ?>>Offline</option>
                           <option value="3" <?php if ($datas['trainer']->mode == 3) {
                                                echo "selected";
                                             } ?>>Hybrid</option>
                    </select>
                    @error('mode')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type">
                           <option value="1" <?php if ($datas['trainer']->type == 1) {
                                                echo "selected";
                                             } ?>>Full Time</option>
                           <option value="2" <?php if ($datas['trainer']->type == 2) {
                                                echo "selected";
                                             } ?>>Per Time</option>
                           <option value="3" <?php if ($datas['trainer']->type == 3) {
                                                echo "selected";
                                             } ?>>Industry</option>
                           <option value="3" <?php if ($datas['trainer']->type == 4) {
                                                echo "selected";
                                             } ?>>Expert</option>
                           <option value="3" <?php if ($datas['trainer']->type == 5) {
                                                echo "selected";
                                             } ?>>Other</option>
                    </select>
                    @error('type')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>No. of hours per week</label>
                    <input type="text" class="form-control" name="no_of_hour_per_week" value="{{$datas['trainer']->no_of_hour_per_week}}">
                    @error('no_of_hour_per_week')
                           <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">{{ __('admin/trainer.status') }}</label>
                        <select class="form-control" name="status">
                            <option value="1" <?php if ($datas['trainer']->status == 1) {
                                                echo "selected";
                                                } ?>>{{ __('admin/trainer.status_active') }}</option>
                            <option value="2" <?php if ($datas['trainer']->status == 2) {
                                                echo "selected";
                                                } ?>>{{ __('admin/trainer.status_deactive') }}</option>
                        </select>
                        @error('status')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                      </div>
               </div>                         

              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Educational Background</div>
                </div>
                <?php if(count($datas['trainer_education']) > 0){?>  
                     @foreach($datas['trainer_education'] as $trainer_educations)
                                              
                        <div class="card-body educationclone">
                      <div class="row toClone_example1">
                        <div class="col-md-6 form-group">
                          <label>School Name</label>
                          <input type="text" class="form-control" name="school_name[]" value="{{$trainer_educations->school_name}}">
                        </div>
                        <div class="col-md-6 form-group">
                          <label>School Location</label>
                          <input type="text" class="form-control" name="school_location[]" value="{{$trainer_educations->school_location}}">
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Degree</label>
                          <input type="text" class="form-control" name="degree[]" value="{{$trainer_educations->degree}}">
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Pass Year</label>
                          <input type="text" class="form-control" name="pass_year[]" value="{{$trainer_educations->pass_year}}">
                        </div>
                        <div class="col-md-4 form-group">
                          <label>Gread</label>
                          <input type="text" class="form-control" name="gread[]" value="{{$trainer_educations->gread}}">
                        </div>
                        <div class="col-12 mb-2">
                          <span role="button" class=" ms-2 badge badge-info addBtn "> Add more</span>
                          <span role="button" class=" ms-2 badge badge-danger btnRemove d-inline"> Remove</span>
                        </div>
                      </div>
                    </div>                       
                     @endforeach
                <?php } else {?>
  
                <div class="card-body educationclone">
                  <div class="row toClone_example1">
                    <div class="col-md-6 form-group">
                      <label>School Name</label>
                      <input type="text" class="form-control" name="school_name[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>School Location</label>
                      <input type="text" class="form-control" name="school_location[]">
                    </div>
                    <div class="col-md-4 form-group">
                      <label>Degree</label>
                      <input type="text" class="form-control" name="degree[]">
                    </div>
                    <div class="col-md-4 form-group">
                      <label>Pass Year</label>
                      <input type="text" class="form-control" name="pass_year[]">
                    </div>
                    <div class="col-md-4 form-group">
                      <label>Gread</label>
                      <input type="text" class="form-control" name="gread[]">
                    </div>
                    <div class="col-12 mb-2">
                      <span role="button" class=" ms-2 badge badge-info addBtn"> Add more</span>
                      <span role="button" class=" ms-2 badge badge-danger btnRemove"> Remove</span>
                    </div>
                  </div>
                </div>                           
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Past Achievements</div>
                </div>
                <div class="card-body">
                <div class="form-group">
                  <textarea id="achievements" class="form-control" name="past_achievements">{{$datas['trainer']->past_achievements}}</textarea>
                </div>
                @error('vocabulary')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div>  
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Prior Experience</div>
                </div>
                @if(count($datas['trainer_experience']) > 0)  
                  @foreach($datas['trainer_experience'] as $key=>$trainer_experiences)
                    <div class="card-body educationclone">
                    <div class="row toClone_example1">
                      <div class="col-md-6 form-group">
                        <label>Job Title</label>
                        <input type="text" class="form-control" name="prior_job_title[]" value="{{$trainer_experiences->job_title}}">
                      </div>
                      <div class="col-md-6 form-group">
                        <label>Employer</label>
                        <input type="text" class="form-control" name="prior_employer[]" value="{{$trainer_experiences->employer}}">
                      </div>
                      <div class="col-md-6 form-group">
                        <label>City/Municipality</label>
                        <input type="text" class="form-control" name="prior_city_municipality[]" value="{{$trainer_experiences->city_municipality}}">
                      </div>
                      <div class="col-md-6 form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" name="prior_country[]" value="{{$trainer_experiences->country}}">
                      </div>
                      <div class="col-md-6 form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="prior_start_date[]" value="{{$trainer_experiences->start_date}}">
                      </div>
                      <div class="col-md-6 form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="prior_end_date[]" value="{{$trainer_experiences->end_date}}">
                      </div>
                      <div class="col-12 mb-2">
                        <span role="button" class=" ms-2 badge badge-info addBtn">Add more</span>
                        <span role="button" class=" ms-2 badge badge-danger btnRemove d-inline"> Remove</span>
                      </div>
                    </div>
                  </div>  
                  @endforeach
                @else
                <div class="card-body educationclone">
                  <div class="row toClone_example1">
                    <div class="col-md-6 form-group">
                      <label>Job Title</label>
                      <input type="text" class="form-control" name="prior_job_title[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Employer</label>
                      <input type="text" class="form-control" name="prior_employer[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>City/Municipality</label>
                      <input type="text" class="form-control" name="prior_city_municipality[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Country</label>
                      <input type="text" class="form-control" name="prior_country[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Start Date</label>
                      <input type="date" class="form-control" name="prior_start_date[]">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>End Date</label>
                      <input type="date" class="form-control" name="prior_end_date[]">
                    </div>
                    <div class="col-12 mb-2">
                      <span role="button" class=" ms-2 badge badge-info addBtn">Add more</span>
                      <span role="button" class=" ms-2 badge badge-danger btnRemove"> Remove</span>
                    </div>
                  </div>
                </div>  
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Expertise</div>
                </div>
                <div class="card-body">
                <div class="form-group">
                  <textarea id="expertise" class="form-control" name="expertise">{{$datas['trainer']->expertise}}</textarea>
                </div>
                @error('vocabulary')
                      <strong class="text-danger">{{ $message }}</strong>
                @enderror
              </div> 
               
              </div>
            </div>

          </div>
          <div class="card">
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
          <br>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
  $( document ).ready(function() {
    $('#achievements').summernote({
      placeholder: 'Past Achievements',
      tabsize: 2,
      height: 100,
      });

      $('#expertise').summernote({
      placeholder: 'Expertise',
      tabsize: 2,
      height: 180,
      });

  });
</script>
@endsection