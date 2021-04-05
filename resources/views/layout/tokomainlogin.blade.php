@extends('layout.main')

@section('css')
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{!! asset('assets/material-bootsrap/vendor/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{!! asset('assets/material-bootsrap/vendor/font-awesome/css/font-awesome.min.css') !!}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{!! asset('assets/material-bootsrap/css/fontastic.css') !!}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{!! asset('assets/material-bootsrap/css/style.default.css') !!}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{!! asset('assets/material-bootsrap/css/custom.css') !!}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{!! asset('assets/material-bootsrap/img/favicon.ico') !!}">
    
    @endsection

@section('script')
    <script src="{!! asset('assets/material-bootsrap/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/material-bootsrap/vendor/popper.js/umd/popper.min.js') !!}"> </script>
    <script src="{!! asset('assets/material-bootsrap/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/material-bootsrap/vendor/jquery.cookie/jquery.cookie.js') !!}"> </script>
    <script src="{!! asset('assets/material-bootsrap/vendor/chart.js/Chart.min.js') !!}"></script>
    <script src="{!! asset('assets/material-bootsrap/vendor/jquery-validation/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('sweetalert/sweetalert.min.js') !!}"></script>
    <!-- Main File-->
    <script src="{!! asset('assets/material-bootsrap/js/front.js') !!}"></script>
@endsection


@section('containerutama')

    @yield('container')

@endsection