<header id="header" class="fixed-top">
    <div class="container">
        <nav class="main-nav float-left d-none d-lg-block">
            <ul>
                <li><a href="#">Pendaftaran KTP</a></li>
            </ul>
        </nav>
        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#intro">Home</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#visi">Visi</a></li>
                <li><a href="#misi">Misi</a></li>
                <li><a href="#tujuansaran">Tujuan & Saran</a></li>
                <li><a href="#tugasfungsi">Tugas Pokok & Fungsi</a></li>
                <li><a href="#struktur">Struktur Organisasi</a></li>
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
