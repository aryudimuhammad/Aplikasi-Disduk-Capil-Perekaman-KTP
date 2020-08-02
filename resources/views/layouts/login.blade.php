<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{url('images/logo.gif')}}" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{url('template/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{url('template/assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{url('template/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{url('template/assets/css/app-style.css')}}" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="{{url('hometemplate/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container">
            <nav class="main-nav float-left d-none d-lg-block">
                <ul>
                    <li><a href="{{url('ktppendaftaranIndex')}}">Pendaftaran KTP</a></li>
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
                        <a class="active" href="{{ url('/home') }}">Home</a>
                        @else
                        <a class="active" style="color: blue;" href="{{ url('/login') }}">Login</a>
                        @endauth
                        @endif
                    </li>
                </ul>
            </nav><!-- .main-nav -->
        </div>
    </header><!-- #header -->

    <div id=" wrapper" style="margin-top: 10%;">
        @yield('content')
    </div>
    <footer id="footer">
        <div class=" container">
            <div class="copyright">
                SISTEM INFORMASI KEPEGAWAIAN PENDAFTARAN DAN PEREKAMAN KTP PADA DINAS KEPENDUDUKAN DAN CATATAN SIPIL
            </div>
        </div>
    </footer><!-- #footer -->

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
