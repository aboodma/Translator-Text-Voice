
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('frontend/2tanslator.png')}}" alt="AdminLTE Logo" class="brand-image  elevation-3"
           style="opacity: .8;float: none">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  {{__('Categories')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Create Category')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('All Categories')}}</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  {{__('Topics')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('topics.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Create Topic')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('topics.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('All Topics')}}</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="{{route('visitors.day')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Last 24 Visitors</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('visitors.month')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Last Month Visitors</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('visitors.all')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">All Visitors</p>
            </a>
          </li>
            <hr>
            <li class="nav-item">
            <a href="{{route('language.create')}}" class="nav-link">
              <i class="nav-icon fa fa-globe text-danger"></i>
              <p class="text">Create Language</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
