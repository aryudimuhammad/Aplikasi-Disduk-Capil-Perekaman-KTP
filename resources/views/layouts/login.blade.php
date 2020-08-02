<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <link href="{{url('hometemplate/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('template/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('template/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('hometemplate/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{url('hometemplate/css/style.css')}}" rel="stylesheet">
    @yield('head')
</head>

<body>
    <div id="wrapper">
        <header id="header" class="fixed-top">
            <div class="container">
                <nav class="main-nav float-left d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="{{route('ktppendaftaranIndex')}}">Pendaftaran KTP</a></li>
                    </ul>
                </nav>
                <nav class="main-nav float-right d-none d-lg-block">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/')}}">Tentang</a></li>
                        <li><a href="{{url('/')}}">Visi</a></li>
                        <li><a href="{{url('/')}}">Misi</a></li>
                        <li><a href="{{url('/')}}">Tujuan & Saran</a></li>
                        <li><a href="{{url('/')}}">Tugas Pokok & Fungsi</a></li>
                        <li><a href="{{url('/')}}">Struktur Organisasi</a></li>
                        <li>
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/home') }}">Home</a>
                            @else
                            <a href="{{ url('/login') }}"">Login</a>
                    @endauth
                    @endif
                </li>
            </ul>
        </nav><!-- .main-nav -->
    </div>
</header><!-- #header -->

        <div class=" clearfix">
            </div>
            @yield('content')
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                SISTEM INFORMASI KEPEGAWAIAN PENDAFTARAN DAN PEREKAMAN KTP PADA DINAS KEPENDUDUKAN DAN CATATAN SIPIL
            </div>
        </div>
    </footer><!-- #footer -->
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
