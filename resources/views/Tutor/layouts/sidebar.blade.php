
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         @if(Auth::guard('tutor')->user()->photo)
        <div class="image">
          <img src="{{url(Auth::guard('tutor')->user()->photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        @else
         <div class="image">
          <img src="{{url('unknown_profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('tutor')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
               <i class="fab fa-blogger-b"></i>
              <p>
                Blog
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                 <i class="fas fa-user-plus"></i>
                  <p>Posts</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('tutor/hire_list')}}" class="nav-link active">
                  <i class="fas fa-tags"></i>
                  <p>Hires</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="{{route('subject_offer')}}" class="nav-link active">
                  <i class="fas fa-users"></i>
                  <p>Subjects</p>
                </a>
              </li> 
              
               <li class="nav-item">
                <a href="{{url('tutor/availability_day')}}" class="nav-link active">
                  <i class="fas fa-address-book"></i>
                  <p>Avilabilities</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tutor/profile')}}" class="nav-link active">
                  <i class="fas fa-address-book"></i>
                  <p>Profile</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="{{route('tutor_setting')}}" class="nav-link active">
                  <i class="fas fa-cogs"></i>
                  <p>Settings</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>