<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('foradmin.admin_home') }}" class="brand-link">
      <span class="brand-text font-weight-light">Quản trị viên</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE/dist/img/afriendofmine.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
        <div>
          <br>
          <a href="/login">Đăng xuất</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>  
      </div> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('foradmin.category') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Product Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('foradmin.product') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('foradmin.statistic') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Statistical tables
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('foradmin.staff') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Staffs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('foradmin.role') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('foradmin.account') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accounts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>