@extends('layouts.main')
@section('title') Dashboard @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bar-chart"></i> Dashboard
                    </div>
                    <div class="card-body">
                        @if(auth()->user()->role == 1)
                        <div class="row mt-3">

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-scooter">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-id-card text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalktp()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Pendaftaran KTP</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-bloody">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-users text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalpegawai()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Total Pegawai</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-quepal">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-window-close text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalpensiun()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Total Pensiun</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-blooker">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-calendar text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalcuti()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Pengusulan Cuti</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-orange">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-undo text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalperpanjang()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Perpanjang Cuti</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-branding">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-building text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalinstansi()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Instansi Kerja</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-jshine">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-building-o text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalunit()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Unit Kerja</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-deepblue">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-object-group text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalsatuan()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Satuan Kerja</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-hossein">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-address-book-o text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totalgolongan()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Total Golongan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-3">
                                <div class="card gradient-ohhappiness">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="w-icon"><i class="fa fa-id-badge text-white"></i></div>
                                            <div class="media-body ml-3 border-left-xs border-white-2">
                                                <h4 class="mb-0 ml-3 text-white">{{totaljabatan()}}</h4>
                                                <p class="mb-0 ml-3 extra-small-font text-white">Total Jabatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 col-xl-12" style="margin-top: 50px; margin-bottom:100px;">
                                <img src="{{url('images/logo.gif')}}" style="margin: auto; display:block;" alt="logo">
                            </div>

                        </div>
                        @else
                        <div class="col-12 col-lg-12 col-xl-12" style="margin-top: 150px; margin-bottom:200px;">
                            <img src="{{url('images/logo.gif')}}" style="margin: auto; display:block;" alt="logo">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <div class="overlay toggle-menu"></div>
    </div>
    <!-- End container-fluid-->
</div>
@endsection
@section('script')
<!-- Chart js -->
<script src="assets/plugins/Chart.js/Chart.min.js"></script>
<!--Peity Chart -->
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Index2 js -->
<script src="assets/js/dashboard-service-support.js"></script>
@endsection
