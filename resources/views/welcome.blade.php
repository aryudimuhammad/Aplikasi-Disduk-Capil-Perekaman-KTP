@extends('layouts.app')
@section('title') Disdukcapil @endsection
@section('style')
<style>
    .text_content {
        text-indent: 50px;
        text-align: justify;
    }
</style>
@endsection
@section('content')

<section id="intro" class="clearfix">
    <div class="container">
        <div class="intro-img">
            <img src="img/intro-img.svg" alt="" class="img-fluid">
        </div>
        <div class="intro-info">
            <h2>Welcome<br>SIM-DISDUKCAPIL</h2>
            <div>
                <a href="{{route('ktppendaftaranIndex')}}" class="btn-get-started scrollto">Pendaftaran KTP</a>
                <a href="{{route('ktppendaftaranShow')}}" class="btn-services scrollto">Lihat Daftar KTP</a>
            </div>
        </div>

    </div>
</section><!-- #home -->

<main id="main">
    <section id="about">
        <div class="container">
            <header class="section-header">
                <h3>Tentang</h3>
                <br><br>
            </header>
            <div class="row about-container">
                <div class="col-lg-12 content order-lg-1 order-2">
                    <p class="text_content">Dinas Kependudukan dan Pencatatan Sipil Provinsi Kalimantan Selatan Merupakan Unsur pelaksana Pemerintah Daerah di Bidang Kependudukan Dan Pencatatan Sipil di Provinsi Kalimantan Selatan yang dipimpin oleh kepala Dinas dan berkedudukan di bawah dan bertanggung jawab kepada gubernur melalui sekretaris Daerah.</p>
                </div>
            </div>
        </div>
    </section><!-- #tentang -->

    <section id="visi" class="section-bg">
        <div class="container">
            <br><br>
            <header class="section-header">
                <h3>Visi</h3>
                <br><br>
            </header>
            <div class="row">
                <p class="text_content"> Visi MANDIRI DAN TERDEPAN DALAM PELAYANAN KEPENDUDUKAN : </p>
                <p> I. Kemandirian pembangunan, mewujudkan keseimbangan antara kemandirian pembangunan dengan aspek lingkungan hidup melalui perluasan kerjasama, baik dalam skala nasional maupun internasional, melalui pengembangkan sektor administrasi publik dengan tujuan untuk meningkatkan dan memeratakan tingkat domisili dan pelayanan yang efektif. </p>
                <p> II. peningkatan pendataan yang dilakukan antara lain agar untuk:
                    <br>
                    (a) memaksimalkan agar setiap penduduk memiliki data yang baik dan benar
                    <br>
                    (b) melakukan peningkatan administrasi agar pelayanan lebih maksimal dan efektif.
                </p>
                <br><br>
            </div>
        </div>
    </section><!-- #visi -->

    <section id="misi" class="clearfix">
        <div class="container">
            <br><br>
            <header class="section-header">
                <h3>Misi</h3>
                <br><br>
            </header>
            <div class="row">
                <p class="text_content">Mengingat pernyataan visi merupakan cita-cita yang ingin diwujudkan dalam jangkauan yang mengarah pada perspektif ke depan, maka dijabarkan lebih lanjut ke dalam pernyataan misi agar dapat menjadi pedoman penyelenggaraan program dalam susunan administrasi kependudukan Provinsi Kalimantan Selatan 2016-2021, sebagai berikut : </p>
                <p>1. Mewujudkan percepatan pembangunan infrastruktur.
                    <br>2. Mewujudkan tata kelola pemerintah berkualitas dengan prinsip-prinsip Good Governance.
                    <br>3. mewujudkan masyarakat yang sehat, cerdas, produktif dan inovatif.
                    <br>4. Mewujudkan masyarakat sejahtera.
                    <br>5. Mewujudkan masyarakat yang tertib dan pembangunan berwawasan lingkungan.</p>
                <br><br>
            </div>
        </div>
    </section><!-- #misi -->

    <section id="tujuansaran" class="section-bg">
        <div class="container">
            <br><br>
            <header class="section-header">
                <h3>TUJUAN DAN SASARAN</h3>
                <br><br>
            </header>
            <div class="row">
                <p class="text_content">Untuk mendukung pencapaian misi daerah berupa mewujudkan tatakelola pemerintahan yang profesional dan berorientasi pada pelayanan publik, maka tujuan yang ingin dicapai Dinas Pencatatan Sipil dan KB Provinsi Kalimantan Selatan adalah :</p>
                <p>1. Terpenuhinya kepuasan masyarakat dalam memperoleh pelayanan</p>
                <p>2. Pelayanan yang cepat dan tepat, tersedianya data penduduk secara akurat.</p>
                <p>3. Masyarakat memiliki dokumen kependudukan secara lengkap dan data kependudukan dapat digunakan sebagai acuan pembangunan.</p>
                <br><br>
            </div>
        </div>
    </section><!-- #tujuansaran -->

    <section id="tugasfungsi">
        <div class="container">
            <br><br>
            <header class="section-header">
                <h3>TUGAS POKOK DAN FUNGSI</h3>
                <br><br>
            </header>
            <div class="row">
                <p>Pelaksanaan dan pengkordinasian penyusunan bahan kebijakan dan program di bidang kependudukan dan pencatatan sipil “.</p>
                <p>Pengkoordinasian pelaksanaan kebijakan pelayanan administrasi di bidang kependudukan dan pencatatan sipil.</p>
                <p>pengkoordinasian pelaksanaan kebijakan teknis di bidang kependudukan dan pencatatan sipil.</p>
                <br><br>
            </div>
        </div>
    </section><!-- #tugasfungsi -->

    <section id="struktur" class="section-bg">
        <div class="container">
            <br><br>
            <header class="section-header">
                <h3>STRUKTUR ORGANISASI</h3>
                <br><br>
            </header>
            <div class="row">
                <p class="text_content">Struktur organisasi DISDUKCAPIL berdasarkan Peraturan Gubernur Kalimantan Selatan Nomor 072 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi dan Tata Kerja Perangkat Daerah Provinsi Kalimantan Selatan, seperti gambar berikut :</p>
                <img style="margin:auto; display:block;" src="{{url('hometemplate/img/struktur.jpg')}}" alt="strukturorganisasi">
            </div>
        </div>
        <br><br>
    </section><!-- #struktur -->
</main>
@endsection
