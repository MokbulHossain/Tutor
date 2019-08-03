
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
                <a href="{{ route('post.index') }}" class="nav-link active">
                 <i class="fas fa-user-plus"></i>
                  <p>Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link active">
                  <i class="fab fa-accessible-icon"></i>
                  <p>Categories</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('tag.index') }}" class="nav-link active">
                  <i class="fas fa-tags"></i>
                  <p>Tags</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link active">
                  <i class="fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li> 
              
               <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link active">
                  <i class="fas fa-address-book"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link active">
                  <i class="fas fa-address-book"></i>
                  <p>Permissions</p>
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