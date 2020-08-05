@extends('layouts.main')
@section('title') Detail Data Pegawai @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Detail Data Pegawai</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pegawaiIndex')}}">Data Pegawai</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Data Pegawai</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user-o"> </i> Detail Data Pegawai {{$data->user->name}}
                        <div class="btn-group float-sm-right">
                            <a class="btn btn-outline-danger btn-sm" href="{{route('pegawaiIndex')}}"> <i class="fa fa-arrow-left"> </i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card profile-card-2">
                                    <div class="card-img-block">
                                        <img class="img-fluid" src="{{url('images/3.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-5">
                                        <img @if($data->user->foto == null) src="{{url('foto/default.png')}}" @else src="foto/{{$data->user->foto}}" @endif class="profile">
                                        <h5 class="card-title">{{$data->user->name}}</h5>
                                        <p class="card-text">NIP : {{$data->nip}}</p>
                                        <p class="card-text">Email : {{$data->user->email}}</p>
                                    </div>
                                    <div class="card-body border-top border-light">
                                        <div class="media align-items-center">
                                            <div>
                                                <a>Instansi Kerja :</a>
                                            </div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{$data->instansi->nama}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Unit Kerja : </a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{$data->unit->nama}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Satuan Kerja :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{$data->satuan->nama}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Golongan :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{$data->golongan->nama}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Jabatan :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{$data->jabatan->nama }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Tanggal Masuk :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    <a>{{carbon\carbon::parse($data->tgl_masuk)->translatedformat('d F Y')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active" id="profile">
                                                <h5 class="mb-5">Profile Pegawai {{$data->user->name}}</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Alamat</h6>
                                                        <p>
                                                            {{$data->alamat}}
                                                        </p>
                                                        <h6>Nomor Telepon</h6>
                                                        <p>
                                                            {{$data->telp}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Tempat Lahir</h6>
                                                        <p>
                                                            {{$data->tempat_lahir}}
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
                                                        <h6>Kependudukan</h6>
                                                        <p>
                                                            {{$data->kependudukan}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Agama</h6>
                                                        <p>
                                                            @if($data->agama == 1) Islam @elseif($data->agama == 2) Kristen Protestan @elseif($data->agama == 3) Katolik @elseif($data->agama == 4) Hindu @elseif($data->agama == 5) Buddha @else Kong Hu Cu @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Kodepos</h6>
                                                        <p>
                                                            {{$data->kodepos}}
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
