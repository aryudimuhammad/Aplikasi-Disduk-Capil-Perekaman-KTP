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
    <!-- Bootstrap core CSS-->
    <link href="{{url('template/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{url('template/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{url('template/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{url('template/assets/css/app-style.css')}}" rel="stylesheet" />
</head>

<body>

    <div id="wrapper">
        @yield('content')
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{('assets/js/jquery.min.js')}}"></script>
    <script src="{{('assets/js/popper.min.js')}}"></script>
    <script src="{{('assets/js/bootstrap.min.js')}}"></script>

    <!-- sidebar-menu js -->
    <script src="{{('assets/js/sidebar-menu.js')}}"></script>

    <!-- Custom scripts -->
    <script src="{{('assets/js/app-script.js')}}"></script>

</body>

</html>
