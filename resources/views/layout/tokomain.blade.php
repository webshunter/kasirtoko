@extends('layout.main')
{{-- area css --}}
@section('css')
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/fontawesome-free/css/all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/daterangepicker/daterangepicker.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/datatable-bootstrap-4/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('sweetalert/sweetalert.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/admin/dist/css/adminlte.min.css') !!}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
{{-- area script --}}
@section('script')
    <script src="{!! asset('assets/admin/plugins/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/dist/js/adminlte.js') !!}"></script>
    <script src="{!! asset('assets/admin/dist/js/demo.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/jquery-mapael/maps/usa_states.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/chart.js/Chart.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/dist/js/pages/dashboard2.js') !!}"></script>
    <script src="{!! asset('assets/datatable-bootstrap-4/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/datatable-bootstrap-4/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('sweetalert/sweetalert.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/select2/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/moment/moment.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/daterangepicker/daterangepicker.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}"></script>
@endsection


@section('containerutama')


<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
            </li>
          </ul>
      
          <!-- SEARCH FORM -->
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
      
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
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
            <li class="navbar-nav">
                <a class="nav-link" href="{{ url('toko/logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ url("toko") }}" class="brand-link">
            <img src="{!! asset('assets/admin/dist/img/AdminLTELogo.png') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{ Session::get("toko-user")['nama_perusahaan'] }}</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="{!! asset('assets/admin/dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
              </div>
            </div>
      
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                  <a href="{{ url('toko') }}" id="sidenav-1" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/akun") }}" id="sidenav-0" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Akun Barang
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/stock-barang") }}" id="sidenav-2" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Stock Barang
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/harga-jual") }}" id="sidenav-3" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Harga Jual
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/pesanan") }}" id="sidenav-4" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Pesanan
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/transaksi") }}" id="sidenav-5" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Penjualan
                    </p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ url("toko/transaksi") }}" id="sidenav-5" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                      Laporan
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">@yield("head-content-title")</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('toko') }}">Home</a></li>
                    @yield("head-back-nav")
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('container')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
      
        <script>
          $("#sidenav-@yield('activenav')").addClass("active");
        </script>

        <!-- /.control-sidebar -->
      
        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>Dibuat Oleh Gugus Darmayanto || grap-store.com
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
          </div>
        </footer>
      </div>

@endsection