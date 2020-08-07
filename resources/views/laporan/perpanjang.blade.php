<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Perpanjang Masa Cuti</title>
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
            border: 1px solid;
            padding-left: 5px;
            text-align: center;
            font-size: 12px;
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

    <div class="container" style="margin-top:-40px;">
        <h3 style="text-align:center; text-transform: uppercase; display:block;">Laporan Data Perpanjang Masa Cuti</h3>
        <table class="table table-bordered nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Cuti</th>
                    <th>Tanggal Masa Cuti</th>
                    <th>Keterangan</th>
                    <th>Status Cuti Aktif</th>
                    <th>Status Perpanjang Masa Cuti</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->pegawai->nip}}</td>
                    <td>{{$d->pegawai->user->name}}</td>
                    <td>@if($d->jenis_cuti == 3 ) Cuti Sakit @elseif($d->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                    <td>{{carbon\carbon::parse($d->mulai_cuti)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir_cuti)->translatedformat('d F Y')}}</td>
                    <td>{{$d->keterangan}}</td>
                    <td>@if($d->status == 1) Belum Diverifikasi @elseif($d->status == 2 ) Terverifikasi @else Tidak Diverifikasi @endif </td>
                    <td>@if($d->perpanjang->status == 1) Belum Diverifikasi @elseif($d->perpanjang->status == 2 ) Terverifikasi @else Tidak Diverifikasi @endif </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <small>Dicetak Pada : Tanggal</small> -->
        <br>
        <br>
        <div class="ttd">
            <h5>
                Banjarbaru,
            </h5>
            <h5>Kepala Dinas</h5>
            <br>
            <br>
            <h5 style="text-decoration:underline; margin-bottom:0px;">Maulana Irfan, S.Kom</h5>
            <!-- <h5>Penanggung jawab</h5> -->
            <h5>NIK. 201101 19920709 7</h5>
        </div>
    </div>
</body>

</html>
