<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link rel="icon" href="{{url('images/logo.gif')}}" type="image/x-icon">
    <link href="{{url('hometemplate/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{url('hometemplate/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{url('hometemplate/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('hometemplate/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{url('hometemplate/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body>

    @include('layouts.navbarhome')

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="copyright">
                SISTEM INFORMASI KEPEGAWAIAN PENDAFTARAN DAN PEREKAMAN KTP PADA DINAS KEPENDUDUKAN DAN CATATAN SIPIL
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{url('hometemplate/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/easing/easing.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/mobile-nav/mobile-nav.js')}}"></script>
    <script src="{{url('hometemplate/lib/wow/wow.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('hometemplate/lib/lightbox/js/lightbox.min.js')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{url('hometemplate/contactform/contactform.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{url('hometemplate/js/main.js')}}"></script>

</body>

</html>
