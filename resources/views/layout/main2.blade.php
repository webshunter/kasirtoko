@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/datatable-bootstrap-4/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('sweetalert/sweetalert.css') !!}">
    <style>
        .nav-bordered a{
            border: 1px solid lightblue;
        }
        .top-content-head{
            position: relative;
            height: calc(100vh - 50px);
        }
        body{
            padding-top: 50px;
        }
        .nav-item a{
            cursor: pointer;
        }

        .nav-item .active{
            cursor: default;
        }

        .full-page{
            margin-top: 50px;
            height: calc(100vh - 100px);
        }

        #content-card{
            height: calc(100vh - 250px);
        }

    </style>
@endsection

@section('script')
    <script src="{!! asset('assets/jquery/jquery.js') !!}"></script>
    <script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/datatable-bootstrap-4/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/datatable-bootstrap-4/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('sweetalert/sweetalert.min.js') !!}"></script>
@endsection


@section('containerutama')

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-ceker">
    <a class="navbar-brand" href="#">Grap-Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href='{{ url('/') }}'>Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">about</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>

@yield('container')

<script>
    $(".action-nav a:nth-child(@yield('active'))").addClass('active');
</script>

@endsection