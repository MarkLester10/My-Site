<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blogabag</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile" class="d-block">{{auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="/admin/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link ml-3">
                  <i class="fas fa-sticky-note nav-icon"></i>
                  <p>Posts</p>
                </a>
              </li>
             @can('posts.category', Auth::user())
             <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link ml-3">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
             @endcan
             @can('posts.tag', Auth::user())
             <li class="nav-item">
                <a href="{{route('tag.index')}}" class="nav-link ml-3">
                  <i class="fa fa-hashtag nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
             @endcan
            </ul>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link ml-3">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Users</p>
                  <span class="badge badge-info right"></span>
                </a>
              </li>
             {{-- @can('admins.role', Auth::user()) --}}
             <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link ml-3">
                  <i class="fa fa-universal-access nav-icon"></i>
                  <p>Roles</p>
                  <span class="badge badge-info right"></span>
                </a>
              </li>
             {{-- @endcan --}}
            </ul>
          </li>

         {{-- @can('admins.permission', Auth::user()) --}}
         <li class="nav-item has-treeview">
            <a href="{{ route('permission.index') }}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Permissions
              </p>
            </a>
          </li>
         {{-- @endcan --}}



      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
