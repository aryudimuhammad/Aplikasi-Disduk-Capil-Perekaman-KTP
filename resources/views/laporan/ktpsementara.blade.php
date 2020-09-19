<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pendaftaran KTP</title>
    <link rel="icon" type="image/png" href="{{url('images/logo.gif')}}">
    <style>
        .logo {
            margin-top: 15px;
            float: left;
            width: 17%;
            padding: 0px;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 0px solid;
            font-size: 14px;
        }

        .judul {
            text-align: center;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 79%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .sizeimg {
            width: 70px;
            height: 80px;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img class="sizeimg" src="images/logo.gif">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h3>
            <h3 style="margin:0px;">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</h3>
            <p style="margin:0px;">Jl. Jenderal Sudirman No. 3 Banjarbaru Kode Pos. 70711</p>
            <p style="margin:0px;">Telp. 05114782013 Fax. 051105114782013</p>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:-60px;">
        <h4 style="text-align:center; text-transform: uppercase; display:block;">KTP Sementara</h4>
        <h4 style="text-align:center; text-transform: uppercase; display:block; margin-top: -20px;">Nomor : {{$data->nomor}}</h4>
        <br>
        <small>Tanggal Dibuat : {{$date}}</small>
        <p>Yang bertanda tangan dibawah ini Kepala Dinas Dinas Kependudukan dan Pencatatan Sipil Provinsi Kalimantan Selatan menerangkan bahwa.</p>
        <table style="padding-bottom: 3px;">
            <tr>
                <td class="text-left" style="padding-left: 60px; width:120px;">Nama</td>
                <td style="width:10px;">:</td>
                <td class="text-left">{{$data->nama}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">NIK</td>
                <td>:</td>
                <td class="text-left">{{$data->nik}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Tempat/Tanggal Lahir</td>
                <td>:</td>
                <td class="text-left">{{$data->tempat_lahir}}/{{$data->tgl_lahir}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Jenis Kelamin</td>
                <td>:</td>
                <td class="text-left">@if($data->jk == 1)Laki-Laki @else Perempuan @endif</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Alamat</td>
                <td>:</td>
                <td class="text-left">{{$data->alamat}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">RT</td>
                <td>:</td>
                <td class="text-left">{{$data->rt}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">RW</td>
                <td>:</td>
                <td class="text-left">{{$data->rw}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Agama</td>
                <td>:</td>
                <td class="text-left"> @if($data->agama == 1) Islam @elseif($data->agama == 2) Kristen Protestan @elseif($data->agama == 3) Katolik @elseif($data->agama == 4) Hindu @elseif($data->agama == 5) Buddha @else Kong Hu Cu @endif</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Status Perkawinan</td>
                <td>:</td>
                <td class="text-left">@if($data->status == 1)Lajang @else Menikah @endif</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Pekerjaan</td>
                <td>:</td>
                <td class="text-left">{{$data->pekerjaan}}</td>
            </tr>
            <tr>
                <td class="text-left" style="padding-left: 60px;">Kewarganegaraan</td>
                <td>:</td>
                <td class="text-left">{{$data->kewarganegaraan}}</td>
            </tr>
        </table>
        <p>Penduduk tersebut adalah benar sudah melakukan perekaman KTP dan penduduk yang bersangkutan telah terdata dalam Database Kependudukan Provinsi Kalimantan Selatan. </p>
        <p>Demikian surat keterangan ini kami buat sebagai pengganti ktp sementara. Surat Keterangan ini berlaku selama 6 (enam) bulan sejak diterbitkan.</p>
        <!-- <small>Dicetak Pada : Tanggal</small> -->
        <br>
        <br>
        <div class="ttd">
            <h5>Banjarbaru,</h5>
            <h5 style="margin-top: -3px;">Kepala Dinas</h5>
            <!-- <img class="sizeimg" src="images/logo.gif"> -->
            <img src="images/qr-code.png" style="padding-top:10px; width: 100px; heigth:100px;" alt="">
            <h5 style="text-decoration:underline; margin-bottom:0px; margin-top: -5px;">Irsan Sayuti, S.Sos, M.Si</h5>
            <!-- <h5>Penanggung jawab</h5> -->
            <h5>NIP. 19720305 199811 1 001 7</h5>
        </div>
    </div>
</body>

</html>
