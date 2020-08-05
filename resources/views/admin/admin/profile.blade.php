@extends('layouts.main')
@section('title') My Profile @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">My Profile</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user-o"> </i> My Profile
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card profile-card-2">
                                    <div class="card-img-block">
                                        <img class="img-fluid" src="{{url('images/3.jpg')}}" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-5">
                                        <img @if(auth()->user()->foto == null) src="{{url('foto/default.png')}}" @else src="foto/{{auth()->user()->foto}}" @endif alt="profile-image" class="profile">
                                        <h5 class="card-title">{{auth()->user()->name}}</h5>
                                        @if(auth()->user()->role == 2)
                                        <p class="card-text">NIP : {{auth()->user()->pegawai->nip}}</p>
                                        @endif
                                        <p class="card-text">Email : {{auth()->user()->email}}</p>
                                    </div>

                                    <div class="card-body border-top border-light">
                                        <div class="media align-items-center">
                                            <div>
                                                <a>Instansi Kerja :</a>
                                            </div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{auth()->user()->pegawai->instansi->nama}}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Unit Kerja : </a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{auth()->user()->pegawai->unit->nama}}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Satuan Kerja :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{auth()->user()->pegawai->satuan->nama}}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Golongan :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{auth()->user()->pegawai->golongan->nama}}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Jabatan :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{auth()->user()->pegawai->jabatan->nama }}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="media align-items-center">
                                            <div><a>Tanggal Masuk :</a></div>
                                            <div class="media-body text-left ml-3">
                                                <div class="progress-wrapper">
                                                    @if(auth()->user()->role == 2)
                                                    <a>{{carbon\carbon::parse(auth()->user()->pegawai->tgl_masuk)->translatedformat('d F Y')}}</a>
                                                    @else
                                                    <a>-</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">My Profile</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit Profile</span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active" id="profile">
                                                <h5 class="mb-5">{{auth()->user()->name}} Profile</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Alamat</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{auth()->user()->pegawai->alamat}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                        <h6>Nomor Telepon</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{auth()->user()->pegawai->telp}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Tempat Lahir</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{auth()->user()->pegawai->tempat_lahir}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                        <h6>Tanggal Lahir</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{carbon\carbon::parse(auth()->user()->pegawai->tgl_lahir)->translatedformat('d F Y')}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Jenis Kelamin</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            @if(auth()->user()->pegawai->jk == 1)
                                                            Laki - Laki
                                                            @else
                                                            Perempuan
                                                            @endif
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                        <h6>Golongan Darah</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            @if(auth()->user()->pegawai->goldar == 1) A @elseif(auth()->user()->pegawai->goldar == 2 ) B @elseif(auth()->user()->pegawai->goldar == 3 ) AB @else O @endif
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Status</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            @if(auth()->user()->pegawai->status == 1)
                                                            Lajang
                                                            @else
                                                            Menikah
                                                            @endif
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                        <h6>Kependudukan</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{auth()->user()->pegawai->kependudukan}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Agama</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            @if(auth()->user()->pegawai->agama == 1) Islam @elseif(auth()->user()->pegawai->agama == 2) Kristen Protestan @elseif(auth()->user()->pegawai->agama == 3) Katolik @elseif(auth()->user()->pegawai->agama == 4) Hindu @elseif(auth()->user()->pegawai->agama == 5) Buddha @else Kong Hu Cu @endif
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Kodepos</h6>
                                                        <p>
                                                            @if(auth()->user()->role == 2)
                                                            {{auth()->user()->pegawai->kodepos}}
                                                            @else
                                                            -
                                                            @endif
                                                        </p>
                                                    </div>
                                                    @if(auth()->user()->role == 2)
                                                    <div class="col-md-12">
                                                        <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Cuti</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-striped">
                                                                <tbody>
                                                                    @foreach($data as $d)
                                                                    <tr>
                                                                        <td>
                                                                            <a>Jenis Cuti</a> @if($d->jenis_cuti == 1) Tahunan @elseif($d->jenis_cuti == 2 ) Nikah @elseif($d->jenis_cuti == 3) Sakit @elseif($d->jenis_cuti == 4) Bersalin @else Karena Alasan Penting @endif <strong style="float:right;"> {{$d->created_at}} </strong>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <!--/row-->
                                            </div>
                                            <div class="tab-pane" id="edit">
                                                @include('admin.admin.update')
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
