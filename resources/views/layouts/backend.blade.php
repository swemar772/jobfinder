<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Find Job | @yield('title')</title>

  <link rel="shortcut icon" href="{{ asset('public/frontend/images/logo.png') }}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}public/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/') }}public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}public/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}public/backend/dist/css/adminlte.min.css">
  <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__wobble" src="{{ asset('public/frontend/images/logo.png') }}" alt="FindJobLogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{-- <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
            </li> --}}
          </ul>

          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            {{-- <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
              </a>
              <div class="navbar-search-block">
                <form class="form-inline">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                      <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li> --}}

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="{{ asset('public/frontend/images/user_simple.png') }}" alt="User Avatar" width="40" class="mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">Call me whenever you can...</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="{{ asset('public/frontend/images/user_simple.png') }}" alt="User Avatar" width="40" class="img-circle mr-3">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">The subject goes here</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="btn btn-danger" onclick="confirmation_logout(event)">
                <i class="fas fa-power-off mr-1"></i> Logout
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ route('dashboard') }}" class="brand-link text-center">
            <img src="{{ asset('public/frontend/images/logo1.png') }}" alt="FindJob Logo" width="150" height="80">
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{{ asset('public/frontend/images/user_simple.png') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="" class="d-block" style="margin-top: -10px;"><strong>{{ Auth::user()->name }}</strong></a>
                @if (Auth::user()->role_id == 5)
                    <span class="badge bg-success">Super Admin</span>
                @elseif (Auth::user()->role_id == 4)
                    <span class="badge bg-success">Admin</span>
                @elseif (Auth::user()->role_id == 3)
                    <span class="badge bg-primary">Partner</span>
                @elseif (Auth::user()->role_id == 2)
                    <span class="badge bg-info">Staff</span>
                @else
                    <span class="badge bg-secondary">Customer</span>
                @endif
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

            @php
                $PermissionUser = App\Models\PermissionRole::getPermission('Users', Auth::user()->role_id);
                $PermissionRole = App\Models\PermissionRole::getPermission('Roles', Auth::user()->role_id);
                $PermissionPermission = App\Models\PermissionRole::getPermission('Permissions', Auth::user()->role_id);
                $PermissionJob = App\Models\PermissionRole::getPermission('Jobs', Auth::user()->role_id);
                $PermissionSetting = App\Models\PermissionRole::getPermission('Setting', Auth::user()->role_id);
                // $PermissionUser = App\Models\PermissionRole::getPermission('User', Auth::user()->role_id);
                // $PermissionUser = App\Models\PermissionRole::getPermission('User', Auth::user()->role_id);
            @endphp

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (!empty($PermissionUser) || !empty($PermissionRole) || !empty($PermissionPermission) )
                    <li class="nav-header">GENARAL MANAGEMENT</li>
                    <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }} {{ request()->routeIs('permissions*') ? 'active' : '' }} {{ request()->routeIs('roles*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                        Users Management
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (!empty($PermissionUser))
                            <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link pl-5 {{ request()->routeIs('users*') ? 'active' : '' }}">
                                <i class="far fa-user nav-icon"></i>
                                <p>Users</p>
                            </a>
                            </li>
                        @endif

                        @if (!empty($PermissionRole))
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link pl-5 {{ request()->routeIs('roles*') ? 'active' : '' }}">
                                <i class="fas fa-user-shield nav-icon"></i>
                                <p>Roles</p>
                                </a>
                            </li>
                        @endif
                        @if (!empty($PermissionPermission))
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" class="nav-link pl-5 {{ request()->routeIs('permissions*') ? 'active' : '' }}">
                                    <i class="fas fa-shield-alt nav-icon"></i>
                                <p>Permissions</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                    </li>
                @endif
                @if (!empty($PermissionSetting))
                    <li class="nav-item menu-open">
                        <a href="{{ route('settings.index') }}" class="nav-link {{ request()->routeIs('settings*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                @endif
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2024 <a href="">JobPortal.com</a></strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
          </div>
        </footer>
      </div>
      <!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/') }}public/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}public/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}public/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}public/backend/sdist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print"]
        order: [
            [0, "desc"]
        ],
    });
  });
</script>

<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
        @if (Session::has('fail'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "error",
                    text: '{{ Session::get('fail') }}',
                });
            </script>
        @endif


        @if (Session::has('success'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    text: '{{ Session::get('success') }}',
                });
            </script>
        @endif

        <script>
            function confirmation_logout(e)
            {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                Swal.fire({
                    title: "Are you sure to Logout?",
                    // text: "this is logout!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#04dc3c",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "<i class='far fa-hand-point-right'></i> Yes, I do!"
                    }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href=urlToRedirect;

                    }
                });
            }


            function confirmation(e)
            {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this data!",
                    // icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href=urlToRedirect;

                    }
                });
            }

            function preview(event)
            {
                const input = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(){
                    const result = reader.result;
                    const img = document.getElementById('img');
                    img.src = result;
                }

                reader.readAsDataURL(input);
            }
        </script>

        @yield('script')
</body>
</html>
