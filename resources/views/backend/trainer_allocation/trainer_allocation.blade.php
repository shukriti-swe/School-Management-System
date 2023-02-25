@extends('backend.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Trainer Allocation  List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trainer Allocation List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Select School</label>
              <select class="form-control select_school">
                <option value="">--Select--</option>
                @foreach($all_school as $all_schools)
                <option value="{{$all_schools->id}}">{{$all_schools->school_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>City</label>
              <select class="form-control select_city">
                <option value="">---Select---</option>
                @foreach($all_city as $all_citys)
                    @if($all_citys->city != '')
                        <option value="{{$all_citys->city}}">{{$all_citys->city}}</option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Online or Offline</label>
              <select class="form-control select_mood">
                <option value="">---Select---</option>
                <option value="1">Online</option>
                <option value="2">Offline</option>
                <!-- <option value="3">Hybrid</option>   -->
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 pt-2 mb-2">
            <h3 class="text-center">Schedule Selected By School</h3>
          </div>
          
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Available Trainers</h4>
                </div>
                <div class="card-body table-responsive p-0" style="max-height:445px;overflow-y: scroll;">
                       <table class="table table-striped table-valign-middle">
                         
                            <tbody id="external-events" class="data_show">
                                                  
      
                              

                            </tbody>
                         
                       </table>
                    </div>
              </div>
            </div> 
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
               
                  <div id="calendar">

                  </div>
                 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
           <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events_new">
                   <div class="external-event get_color" data-id="1" check-drop="2" style="background-color:rgb(0,128,0)">Guest Speaker</div>
                    <div class="external-event get_color" data-id="1" check-drop="2" style="background-color:rgb(255,215,0)">Makers Session</div>
                    <div class="external-event get_color" data-id="1" check-drop="2" style="background-color:rgb(0,128,128)">Kid Talk</div>
                    <div class="external-event get_color" data-id="1" check-drop="2" style="background-color:rgb(0, 86, 179)">Case Study</div>
                    <div class="external-event get_color" data-id="1" check-drop="2" style="background-color:rgb(255,0,0)">Movie Watching</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" id="grade_data">
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <div id="calendarModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                  <h4 id="modalTitle" class="modal-title"></h4>
              </div>
          
                <form action="{{ route('backend.assigntrainer.assigntrainer')}}" id="trainer_assign" method="post">
                  @csrf

                    <!-- <input type="hidden" id="class_schedule_date" name="class_schedule_date"> -->
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="trainer_id" name="trainer_id">
                    <input type="hidden" id="day" name="day">
                    <input type="hidden" id="trainer_name_id" name="trainer_name">
                <div id="modalBody" class="modal-body">    
                   <label for="">Class Schedule</label>
                    <select class="form-control" name="class_schedule" id="class_schedule">
                          
                    </select>
  

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="save_change">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      </div>
      </div>

      <div id="calendarModal_schedule" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                  <h4 id="modalTitle" class="modal-title"></h4>
              </div>
          
                <form action="{{ route('backend.assigntrainer.assigntrainer')}}" id="trainer_assign" method="post">
                  @csrf

                    <!-- <input type="hidden" id="class_schedule_date" name="class_schedule_date"> -->
                    <input type="hidden" id="event_date" name="event_date">
                    <input type="hidden" id="trainer_id" name="trainer_id">
                    <input type="hidden" id="day" name="day">
                    <input type="hidden" id="trainer_name_id" name="trainer_name">
                <div id="modalBody" class="modal-body">    
                   <label for="">Class Schedule</label>
                  
                    <div class="full_class_schedule">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      </div>
      </div>
      <!-- Event Delete -->
      <div id="calendarModal_new" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                  <h4 id="modalTitle" class="modal-title"></h4>
              </div>
           
                <form action="{{ route('backend.assigntrainer_delete')}}" id="assigntrainer_delete" method="post">
                 @csrf
                    <!-- <input type="hidden" id="class_schedule_date" name="class_schedule_date"> -->
                    <input type="hidden" id="event_id" name="trainer_assign_id">
                    <input type="hidden" id="custom_event_id" name="custom_event_id">
                   <label for="" class="ml-3">Do you want to delte this trainer Schedule?</label>
                   

              
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </form>
          </div>
      </div>
      </div>
      <!-- End Delete Event modal -->
    </section>
  </div>

<script>
   var calendar;
   var i;
   var html='';
   $( document ).ready(function() {
      localStorage.setItem('schoolid','0');
      $('.select_city').on('change',function(){
        var city_id=$(this).val();
        var mood_id=$('.select_mood').val();
        if((mood_id != '')&&(city_id != ''))
        {
           get_all_trainer(city_id,mood_id);
        }
      });
      $('.select_mood').on('change',function(){
        var mood_id=$(this).val();
        var city_id=$('.select_city').val();
      
        if((mood_id != '')&&(city_id != ''))
        {
          get_all_trainer(city_id,mood_id);
        }
      });

      function get_all_trainer(city_id,mood_id)
      {
          //console.log(city_id);
          //console.log(mood_id);
          $.ajax({
          url: "{{route('backend.alltainer.alltainer')}}",
          data: {
               city_id: city_id,
               mood_id:mood_id
          },
          type: 'get',
          success: function(data) {
              var data=JSON.parse(data);
              var i;
              var html = '';
              for(i=0; i<data.length; i++)
              {
                html += '<tr class="bg-info dragable_data trainer_remove" data-id="'+data[i].id+'" check-drop="1"><td>'+data[i].trainer_name+'</td></tr>';
              }
              $('.data_show').html(html);
          }
          
        });
     }

     $('.select_school').on('change',function(){
        var school_id=$(this).val();
        localStorage.setItem('schoolid',school_id);
        calendar.refetchEvents();
     });
  });

 
 
   //Full Calendar section----------------------------------
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    //for Trainer draging-----------------
    var draggableEl = document.getElementById('external-events');
    var draggableE2 = document.getElementById('external-events_new');

    new FullCalendar.Draggable(draggableEl, {
    itemSelector: ".dragable_data",
    eventData: function(eventEl) {
      // console.log(eventEl);
        return {
            title: eventEl.innerText.trim()
        }
    }
   });

   new FullCalendar.Draggable(draggableE2, {
    itemSelector: ".external-event",
    eventData: function(eventE1) {
        console.log(eventE1);
        return {
            title: eventE1.innerText.trim()
        }
    }
   });

    calendar = new FullCalendar.Calendar(calendarEl, {
       headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      // initialDate: '2022-06-02',
      initialView: 'dayGridMonth',
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      droppable: true,//for drag drop
      events: function(fetchInfo, successCallback, failureCallback) {
        //alert(localStorage.schoolid);
        jQuery.ajax({
            type: 'get',
            url: "{{route('backend.trainer_schedule_show.trainer_schedule_show')}}",
            data: {
               school_id: localStorage.schoolid,
            },
            success: function(events) {
               
                var new_event=JSON.parse(events);
                //console.log(typeof new_event);
                //console.log(new_event);
               
                successCallback(new_event);
            }
        });

        jQuery.ajax({
            type: 'get',
            url: "{{route('backend.trainer_schedule_show.trainer_schedule_show')}}",
            data: {
               school_id: localStorage.schoolid,
            },
            success: function(events) {
               
                var new_event=JSON.parse(events);
                //console.log(typeof new_event);
                //console.log(new_event);
               
                successCallback(new_event);
            }
        });
      },
      drop: function(event, draggedEl) {
        //console.log(event);
        //alert(localStorage.schoolid);
        if(localStorage.schoolid == '0')
        {
          alert('please choose the schhol');
          location.reload();
          return;
        }
     
        var month=event.date.getMonth()+1;
        var day=event.date.getDay();
        var event_date=event.dateStr;
        var check=event.draggedEl.attributes[2].value;

        if(event.draggedEl.attributes[2].value == 1)
        {
          var trainer_name=event.draggedEl.innerText;
          var trainer_id=event.draggedEl.attributes[1].value;
        
          jQuery.ajax({
            type: 'get', 
            url: "{{route('backend.trainer_class_schedule.trainer_class_schedule')}}",
            data: {
               school_id: localStorage.schoolid,
               day:day
            },
            success: function(events) {
               
                var new_event=JSON.parse(events);
                //console.log(new_event);
                if(new_event.no_schedule)
                {
                  alert(new_event.no_schedule);
                  var html='';
                  for(i=0; i<new_event.class_schedlue.length; i++)
                  {
                    html+='<div>'+new_event.class_schedlue[i].title+'</div>';
                  }
                  $('.full_class_schedule').html(html);
                  $('#calendarModal_schedule').modal();
                }
                else
                {
                  var html='';
                  for(i=0; i<new_event.length; i++)
                  {
                    html+='<option value="'+new_event[i].title+'">'+new_event[i].title+'</option>';
                  }

                  $('#class_schedule').html(html);
                  $('#event_date').val(event_date);
                  $('#trainer_id').val(trainer_id);
                  $('#day').val(day);
                  $('#trainer_name_id').val(trainer_name)
                  $('#calendarModal').modal();
                }
               
            }
        });
          
        }
        else
        {
         
        
          var color_code=$('.get_color').attr('color_code');
       
          if(color_code == 3)
          {
          var get_color=event.draggedEl.attributes[4].value;

          var color=get_color.split(":");
          var exact_color=color[1].split(";");
          var final_color=exact_color[0];
          }
          else
          {
            var get_color=event.draggedEl.attributes[3].value;
   
            var color=get_color.split(":");
            var final_color=color[1];
          }
        
          //Draggable Events add------------------
          var event_name=event.draggedEl.innerText;
          
            jQuery.ajax({
              type: 'get',
              url: "{{route('backend.event_insert.event_insert')}}",
              data: {
                school_id: localStorage.schoolid,
                event_name: event_name,
                event_date: event_date,
                event_color:final_color
              },
              success: function(events) {
                location.reload();
                
              }
          });
        }
      
   
      },
  
      eventClick:  function(data, jsEvent, view) {
   
            //console.log(data.event.id);
            $('#event_id').val(data.event.id);
            $('#custom_event_id').val(data.event.extendedProps.ids);
            $('#calendarModal_new').modal();
        },
      //new Draggable(draggableEl);
    });

    calendar.render();

    //Add event to a dragable-----------------
      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color');
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })

    $('#add-new-event').click(function (e) {;
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val();
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div/>')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event get_color').attr({"data-id": 1,"check-drop": 2, "color_code":3});
      event.text(val)

      $('#external-events_new').prepend(event)
      //console.log(event);
      // Add draggable funtionality
      //ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })

  });



  //Trainer assign-------------------------
  $('#trainer_assign').submit(function(e){
       e.preventDefault();
   
        var url = $(this).attr('action');
        var request = $(this).serialize();
        var custom_data=request;
        $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        async: false,
        data: custom_data+"&school_id="+localStorage.schoolid,
        dataType: 'JSON',
        success: function(data) {

              //If one schedule trainer already exits----------------------
              if(data.trainer_exist)
              {
                alert(data.trainer_exist);
              }
             //it's for trainer remove if trainer get more tan 4 ot 16 hour class to a school  in a day or a week
                if(data.success == 4)
                {
                  $( ".trainer_remove" ).each(function() {
                      var id=$(this).attr('data-id');
                      if(data.trainer_id == id)
                      {
                        $(this).remove(); 
                      }
                    });  
                }

                if(data.today_tainer_hour == 4)
                {
                  alert('This trainer already assign for 4hour class in a day and 16 hour in a week')
                  $( ".trainer_remove" ).each(function() {
                      var id=$(this).attr('data-id');
                      if(data.trainer_id == id)
                      {
                        $(this).remove(); 
                      }
                    });  
                }

                $('#class_schedule').empty();
                $('#calendarModal').modal('hide');
                
          }  
      });   
  });

  //Assigned Trainer Delete-----------------
  $('#assigntrainer_delete').submit(function(e){
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
              console.log(data);
              $('#calendarModal_new').modal('hide');
              location.reload();
        }
      });
  });
 </script>
@endsection