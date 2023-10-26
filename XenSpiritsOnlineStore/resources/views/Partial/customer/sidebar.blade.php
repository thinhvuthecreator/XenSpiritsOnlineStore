<head>
<link rel="stylesheet" href="{{asset('CSS/customer.sidebar.css')}}">
</head>
<body>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE/dist/img/twixim.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('foradmin.profile') }}" class="d-block">TWIXIM_</a>
        </div>
        <div>
          <br>
          <a href="{{ route('logout') }}">Đăng xuất</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
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
            <a href="{{ route('foradmin.customer') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customers
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
</body>