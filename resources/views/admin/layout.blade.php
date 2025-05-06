<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title', 'SI Kulawu') | Dashboard  </title>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('home/assets/img/logo-menak-furniture.png') }} ">

    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/dist/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{asset('admin/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.css')}} ">
    <link rel="stylesheet" href="{{asset('admin/dist/plugins/datatables-responsive/css/responsive.bootstrap4.css')}} ">

    <link rel="stylesheet" href="{{asset('admin/dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}} ">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->

        <!-- Navbar -->
        @include('layout.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.sidebar')


        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Content Wrapper. Contains page content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')


                </div>
            </section>
            <!-- ./wrapper -->

        </div>

        @stack('script')

        <!-- jQuery -->
        <script src="{{ asset('admin/dist/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('admin/dist/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('admin/dist/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('admin/dist/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <!-- daterangepicker -->
        <script src="{{ asset('admin/dist/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin/dist/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <!-- AdminLTE App -->
        <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
