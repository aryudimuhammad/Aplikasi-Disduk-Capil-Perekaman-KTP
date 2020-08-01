<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--favicon-->
    <link rel="icon" href="{{url('template/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{url('template/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{url('template/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--Data Tables -->
    <link href="{{url('template/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('template/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <!-- animate CSS-->
    <link href="{{url('template/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{url('template/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{url('template/assets/css/sidebar-menu.css')}}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{url('template/assets/css/app-style.css')}}" rel="stylesheet" />
    <!-- skins CSS-->
    <link href="{{url('template/assets/css/skins.css')}}" rel="stylesheet" />
    @yield('link')
</head>

<body>
    <div id="wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="clearfix"></div>
        @yield('content')
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    </div>
    @include('sweetalert::alert')
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('template/assets/js/jquery.min.js')}}"></script>
    <script src="{{url('template/assets/js/popper.min.js')}}"></script>
    <script src="{{url('template/assets/js/bootstrap.min.js')}}"></script>

    <!-- simplebar js -->
    <script src="{{url('template/assets/plugins/simplebar/js/simplebar.js')}}"></script>
    <!-- sidebar-menu js -->
    <script src="{{url('template/assets/js/sidebar-menu.js')}}"></script>

    <!-- Custom scripts -->
    <script src="{{url('template/assets/js/app-script.js')}}"></script>
    <script src="{{url('vendor/sweetalert/sweetalert.all.js')}}"></script>
    @yield('script')
</body>

</html>
