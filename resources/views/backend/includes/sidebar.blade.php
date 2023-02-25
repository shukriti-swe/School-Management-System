<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
    <img src="{{asset('asset/images/logo-icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Kidspreneurship</span>
  </a>
  <!-- Sidebar -->

  <!-- =============== Admin Start ============== -->
  @if (Session::get('user_group') == 1)
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Session::get('admin_image'))}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('admin_name')}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item menu-open">
            <a href="{{ route('backend.dashboard') }}" class="nav-link
              {{request()->route()->getName() == 'backend.dashboard' ? 'active' : ''}}
            ">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                School Onboarding
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.schoollist.schoolList') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.schoollist.schoolList' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.schoolcreate.schoolCreate') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.schoolcreate.schoolCreate' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create School </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.school-notificationbox') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.school-notificationbox' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification Message </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Trainer Onboarding
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.trainerlist.trainerList') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.trainerlist.trainerList' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trainer List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.addtrainer.addTrainer') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.addtrainer.addTrainer' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Trainer </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.trainer-notificationbox') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.trainer-notificationbox' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification Message </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Trainer Allocation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.trainerallocation.trainerallocation') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.trainerallocation.trainerallocation' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Training</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.contentlist.contentList') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.contentlist.contentList' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.addcontent.addContent') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.addcontent.addContent' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Content </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('backend.create-assignment') }}" class="nav-link
              {{request()->route()->getName() == 'backend.create-assignment' ? 'active' : ''}}
            ">
              <i class="fas fa-upload"></i>
              <p>
                Student Communication
              </p>
            </a>
          </li>


          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.eventlist.eventlist')}}" class="nav-link
                  {{request()->route()->getName() == 'backend.eventlist.eventlist' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Events List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.createevent.createevent') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.createevent.createevent' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Event</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Others
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.resources.resources') }}" class="nav-link
                  {{request()->route()->getName() == 'backend.resources.resources' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Other Resources </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

  @endif

  <!-- =============== School Start ============== -->
  @if(Session::get('user_group') == 2)
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Session::get('school_image'))}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-wrap">{{Session::get('school_name')}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('school.dashboard') }}" class="nav-link
              {{request()->route()->getName() == 'school.dashboard' ? 'active' : ''}}
            ">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.profile-edit') }}" class="nav-link
              {{request()->route()->getName() == 'school.profile-edit' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('school.student-list') }}" class="nav-link
              {{request()->route()->getName() == 'school.student-list' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('school.class_schedule') }}" class="nav-link
              {{request()->route()->getName() == 'school.class_schedule' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Class Schedule
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('school.progress-report') }}" class="nav-link
              {{request()->route()->getName() == 'school.progress-report' ? 'active' : ''}}
            ">
              <i class="fas fa-chart-line nav-icon"></i>
              <p>Student Progress Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.event-list') }}" class="nav-link
              {{request()->route()->getName() == 'school.event-list' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('school.privacy-police') }}" class="nav-link
              {{request()->route()->getName() == 'school.privacy-police' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Terms & Privacy Policy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  @endif

  <!-- =============== Trainer Start ============== -->
  @if (Session::get('user_group') == 3)
    <!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mb-3 pb-3 ">

        <div class=" mt-3 pb-3 d-flex">
          <div class="image">
            <img src="{{asset(Session::get('trainer_image'))}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Session::get('trainer_name')}}</a>
          </div>

        </div>

        <div class="profile-info">
          Classes
          <span class="badge badge-info">20</span>
        </div>
        <div class="profile-info">
          Students
          <span class="badge badge-danger">320</span>
        </div>
        <div class="profile-info">
          Payout
          <span class="badge badge-warning">INR 10,000</span>
        </div>
      </div>


      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('trainer.dashboard') }}" class="nav-link
              {{request()->route()->getName() == 'trainer.dashboard' ? 'active' : ''}}
            ">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('trainer.profile')}}" class="nav-link
              {{request()->route()->getName() == 'trainer.profile' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('trainer.content/list.contentList') }}" class="nav-link
              {{request()->route()->getName() == 'trainer.content/list.contentList' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                Content
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainer.class/schedule.classSchedule') }}" class="nav-link
              {{request()->route()->getName() == 'trainer.class/schedule.classSchedule' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Class Schedule
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('trainer.student_list')}}" class="nav-link
                  {{request()->route()->getName() == 'trainer.student_list' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trainer.student_attendence')}}" class="nav-link
                  {{request()->route()->getName() == 'trainer.student_attendence' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainer.event/list.eventList')}}" class="nav-link
              {{request()->route()->getName() == 'trainer.event/list.eventList' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events and Collaterals
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('trainer.todo_index')}}" class="nav-link
              {{request()->route()->getName() == 'trainer.todo_index' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                To Do
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Assignment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('trainer.createAssignment')}}" class="nav-link
                  {{request()->route()->getName() == 'trainer.createAssignment' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Assignment </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trainer.viewAssignment')}}" class="nav-link
                  {{request()->route()->getName() == 'trainer.viewAssignment' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assignment View </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('trainer.trainer-certificate')}}" class="nav-link
              {{request()->route()->getName() == 'trainer.trainer-certificate' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
                Certification
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('trainer.termsandprivacypolicy')}}" class="nav-link
              {{request()->route()->getName() == 'trainer.termsandprivacypolicy' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Terms & Privacy Policy
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>

      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  @endif

  <!-- =============== Student Start ============== -->
  @if (Session::get('user_group') == 4)
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          @if(Session::get('student_image') != 'no_image')
            <img class="profile-user-img img-fluid img-circle" src="{{asset(Session::get('student_image'))}}" alt="User profile picture">
          @else
            <img src="{{ asset('img/default-150x150.png') }}" alt="Product 1" class="img-circle mr-2">
          @endif

        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('student_name')}}</a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('student.dashboard') }}" class="nav-link
              {{request()->route()->getName() == 'student.dashboard' ? 'active' : ''}}
            ">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('student.student-profile') }}" class="nav-link
              {{request()->route()->getName() == 'student.student-profile' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
            
       
          <li class="nav-item">
            <a href="{{route('student.assignment')}}" class="nav-link 
                {{request()->route()->getName() == 'student.assignment' ? 'active' : ''}}
              ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                 Assignment 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{route('student.Class_schedule')}}" class="nav-link
              {{request()->route()->getName() == 'student.Class_schedule' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                   Class Schedule   
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                 My Project/Ideas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.list-project') }}" class="nav-link
                  {{request()->route()->getName() == 'student.list-project' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.add-project') }}" class="nav-link
                  {{request()->route()->getName() == 'student.add-project' ? 'active' : ''}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Project</p>
                </a>
              </li>  
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('student.event_list')}}" class="nav-link
              {{request()->route()->getName() == 'student.event_list' ? 'active' : ''}}
            "> 
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Events
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('student.student-certificate')}}" class="nav-link
              {{request()->route()->getName() == 'student.student-certificate' ? 'active' : ''}}
            ">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
                Certification
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('student.term_and_privacy_policy')}}" class="nav-link
              {{request()->route()->getName() == 'student.term_and_privacy_policy' ? 'active' : ''}}
            "> 
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Terms & Privacy Policy
              </p>
            </a>
          </li> 
          
        
   
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

         
          
          
        </ul>
      </nav>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  @endif

</aside>