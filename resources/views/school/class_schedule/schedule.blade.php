@extends('backend.layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Class Schedule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class Schedule</li>
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
        
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

      <!-- Event Delete -->
      <div id="calendarModal_new" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
            
                <div id="modalBody" class="modal-body">    
                   <label for="">Class Schedule</label>
                  
                    <div class="full_class_schedule">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>
        <!-- End Delete Event modal -->
  </div>

  <script>
  
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            //initialView: 'dayGridMonth',
            headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            //initialDate: '2022-06-01',
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            droppable: true,//for drag drop
            events: function(fetchInfo, successCallback, failureCallback) {
            jQuery.ajax({
            type: 'get',
            url: "{{route('school.school_classSchedule')}}",
            data: {
               //school_id: localStorage.schoolid,
            },
            success: function(events) {
               
                var new_event=JSON.parse(events);
                //console.log(typeof new_event);
                //console.log(new_event);  
               
                successCallback(new_event);
            }
           });
           
        },
        dateClick: function(info) {
          var day=info.date.getDay();
          jQuery.ajax({
              type: 'get',
              url: "{{route('school.day_class_schedule')}}",
              data: {
                day: day,
              },
              success: function(data) {
                var new_event=JSON.parse(data);
                console.log(new_event.length);
                var html='';
                if(new_event.length > 0)
                {               
                  $('.full_class_schedule').html(new_event);
                  $('#calendarModal_new').modal('show');
                }
                else
                {
                  html='This day has no data';
                  $('.full_class_schedule').html(html);
                  $('#calendarModal_new').modal('show'); 
                }
              
              }
          });
      
        },
  
        });
            calendar.render();
        });

  
  </script>
  <style>
    /* .fc-event-title
    {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    } */
  </style>
@endsection