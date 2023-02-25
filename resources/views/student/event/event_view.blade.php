@extends('backend.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$event['event_name']}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$event['event_name']}}</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                  <img src="{{asset($event['event_image'])}}" class="img-fluid" height="150" width="300">
                  <div class="pt-4 pb-2">
                    <p><strong><i class="fas fa-map-marker-alt mr-1"> </i>{{$event['event_address']}} </strong></p>
                  </div>
                  {!!$event['event_description']!!}
                  <!-- <div class="">
                      <a class="btn btn-warning">
                        <i class="fas fa-file-pdf"></i> 
                      </a>
                      <a class="btn btn-warning ">
                        <i class="fas fa-file-pdf"></i> 
                      </a>
                      <a class="btn btn-danger">
                        <i class="fas fa-file-image"></i> 
                      </a>
                      
                      <a class="btn btn-danger">
                        <i class="fas fa-file-image"></i> 
                      </a>
                   </div> -->
                   <a class="btn btn-primary mt-4" href="{{$event['landing_page']}}">Register Now</a>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </section>
  </div>
   <div class="modal fade" id="registrationevent">
      <div class="modal-dialog">
        <div class="modal-content">
        <form id="booking_register">
          <div class="modal-header">
            <h4 class="modal-title">Event Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            <input type="hidden" name="event_id" id="event_id" class="form-control" value="{{$event['id']}}">
            </button>
          </div>
          <div class="alert alert-success registration_success" style="text-align: center;display:none">Registration success</div>
          <div class="alert alert-danger registration_faild" style="text-align: center;display:none">You Already Registered</div>
          <div class="modal-body">  
            <div class="form-group row">
              <div class="form-row form-row-1">
                <label for="full-name">FULL NAME:</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required="">
                <span id="full_name_error" class="text-danger"></span>
              </div>
              <div class="form-row form-row-1">
                <label for="your-email">YOUR EMAIL:</label>
                <input type="text" name="email" id="your_email" class="form-control" required="">
                <span id="email_error" class="text-danger"></span>
              </div>
            </div>
            <div class="form-group row form-group-1">
              <div class="form-row form-row-2">
                <label for="person">PERSON:</label>
                <input type="number" id="person" class="form-control" name="person" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                <span id="person_error" class="text-danger"></span>
              </div>
              <div class="form-row form-row-3">
                <label for="date">DATE:</label>
                <input type="date" name="date"class="form-control" id="date" placeholder="8/9/2018"> 
                <span id="date_error" class="text-danger"></span>
              </div>
              <div class="form-row form-row-4">
                <label for="ticket">TICKET TYPE:</label>
                <select name="position" id="ticket" class="form-control">
                <option value="1">VIP</option>
                <option value="2">Luxury</option>
                <option value="3">Basic</option>
                <option value="4">Normal</option>
                </select>
                <span class="select-btn">
                <i class="zmdi zmdi-chevron-down"></i>
                </span>
                <span id="position_error" class="text-danger"></span>
              </div>
            </div>
            <div class="special">
              <h3><strong>${{$event['event_fee']}}</strong> </h3>
              <p>/ VIP Person</p>
            </div>
             
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="booking_agree" name="booking_agree" value="1">
              <label class="form-check-label" for="exampleCheck1"><p>By booking, you agree to the <a href="#" class="text">Terms of Service</a></p></label>
              <div>
              <span id="booking_agree_error" class="text-danger"></span>
              </div>
            </div>
            
 
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button"  name="register" class="btn btn-primary" id="register_event">Booking Now</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<script>
    $(document).ready(function() {
      
        $('#register_event').click(function() {
         
           var booking_register = $("#booking_register").serialize();

           $.ajax({
            url: "{{ route('student.event_booking_registration') }}",
            headers: {   
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            data: booking_register,
            dataType: 'json',
            success: function(data) {
              console.log(data.error);
                if(data.error)
              {
                if('full_name' in data.error){
                  $('#full_name_error').html(data.error.full_name[0]);
                }

                if('email' in data.error){
                  $('#email_error').html(data.error.email[0]); 
                }

                if('person' in data.error){
                  $('#person_error').html(data.error.person[0]);
                }

                if('date' in data.error){
                  $('#date_error').html(data.error.date[0]);
                }

                if('position' in data.error){
                  $('#position_error').html(data.error.position[0]);
                }

                if('booking_agree' in data.error){
                  $('#booking_agree_error').html(data.error.booking_agree[0]);
                }
                
              }

                if(data==1){
                  $(".registration_success").css('display','block');
                }else if(data==2){
                  $(".registration_faild").css('display','block');
                }
            }
          });
        });
        
    });
</script>
@endsection