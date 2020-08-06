@extends('layouts.main')
@section('title') Detail Data KTP @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Detail Data KTP</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('ktpIndex')}}">Data Pendaftaran KTP</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Data KTP</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user-o"> </i> Detail Data KTP {{$data->nama}}
                        <div class="btn-group float-sm-right">
                            <a class="btn btn-outline-danger btn-sm" href="{{route('ktpIndex')}}"> <i class="fa fa-arrow-left"> </i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card profile-card-2">
                                    <div>
                                        <img class="img-fluid" src="{{url('images/ktp.jpg')}}" width="100%;" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-5">
                                        @if($data->foto == null)
                                        <img src="{{url('foto/default.png')}}" class="profile">
                                        @else
                                        <img src="{{url('foto/'.$data->foto.'')}}" class="profile">
                                        @endif
                                        <h5 class="card-title">{{$data->nama}}</h5>
                                        <p class="card-text">Permohonan : @if($data->permohonan == 1) Baru @elseif($data->permohonan == 2) Perpanjangan @elseif($data->permohonan == 3 ) Pergantian @else - @endif</p>
                                        <p class="card-text">Email : {{$data->email}}</p>
                                        <p class="card-text">Status : @if($data->status == 1) <a class="text-warning">Belum Diverifikasi</a> @elseif($data->status == 2) <a class="text-primary">Tererifikasi</a> @elseif($data->status == 3) <a class="text-info">Tidak Diverifikasi</a> @else <a class="text-success">Selesai</a> @endif </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active" id="profile">
                                                <h5 class="mb-5">Detail KTP {{$data->nama}}</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Nama</h6>
                                                        <p>
                                                            {{$data->nama}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Alamat</h6>
                                                        <p>
                                                            {{$data->alamat}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>NIK</h6>
                                                        <p>
                                                            {{$data->nik}}
                                                        </p>
                                                        <h6>KK</h6>
                                                        <p>
                                                            {{$data->kk}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Kewarganegaraan</h6>
                                                        <p>
                                                            {{$data->kewarganegaraan}}
                                                        </p>
                                                        <h6>Agama</h6>
                                                        <p>
                                                            @if($data->agama == 1) Islam @elseif($data->agama == 2) Kristen Protestan @elseif($data->agama == 3) Katolik @elseif($data->agama == 4) Hindu @elseif($data->agama == 5) Buddha @else Kong Hu Cu @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>RT</h6>
                                                        <p>
                                                            {{$data->rt}}
                                                        </p>
                                                        <h6>Tempat Lahir</h6>
                                                        <p>
                                                            {{$data->tempat_lahir}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>RW</h6>
                                                        <p>
                                                            {{$data->rw}}
                                                        </p>
                                                        <h6>Tanggal Lahir</h6>
                                                        <p>
                                                            {{carbon\carbon::parse($data->tgl_lahir)->translatedformat('d F Y')}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Jenis Kelamin</h6>
                                                        <p>
                                                            @if($data->jk == 1)
                                                            Laki - Laki
                                                            @else
                                                            Perempuan
                                                            @endif
                                                        </p>
                                                        <h6>Golongan Darah</h6>
                                                        <p>
                                                            @if($data->goldar == 1) A @elseif($data->goldar == 2 ) B @elseif($data->goldar == 3 ) AB @else O @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Status</h6>
                                                        <p>
                                                            @if($data->status == 1)
                                                            Lajang
                                                            @else
                                                            Menikah
                                                            @endif
                                                        </p>
                                                        <h6>Kewarganegaraan</h6>
                                                        <p>
                                                            {{$data->kewarganegaraan}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Pekerjaan</h6>
                                                        <p>
                                                            {{$data->pekerjaan}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Keterangan</h6>
                                                        <p>
                                                            @if($data->keterangan == null)
                                                            -
                                                            @else
                                                            {{$data->keterangan}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <div class="overlay toggle-menu"></div>
    </div>
    <!-- End container-fluid-->
</div>
@endsection
