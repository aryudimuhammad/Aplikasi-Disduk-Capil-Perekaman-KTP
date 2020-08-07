@extends('layouts.main')
@section('title') Data Masa Cuti Aktif @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Masa Cuti Aktif</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Masa Cuti Aktif</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Masa Cuti Aktif
                        <div class="btn-group float-sm-right">
                            @if(Auth()->user()->role == 1)
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="{{route('perpanjangCetak')}}" target="_blank" class="dropdown-item">Keseluruhan</a>
                                <button data-toggle="modal" data-target="#modalcetaktgl" class="dropdown-item">Cetak Berdasarkan Tanggal Mulai Cuti</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
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
                                        <td>
                                            @if($d->perpanjang_id == !null)
                                            @if($d->perpanjang->status == 1)
                                            <a class="btn btn-outline-primary btn-sm" href="{{route('perpanjangShow',['id' => $d->uuid])}}"> <i class="fa fa-bell"> Belum Diverifikasi </i> </a>
                                            @elseif($d->perpanjang->status == 2)
                                            <a class="btn btn-outline-success btn-sm" href="{{route('perpanjangShow',['id' => $d->uuid])}}"> <i class="fa fa-check-square"> Terverifikasi </i> </a>
                                            @else
                                            <a class="btn btn-outline-danger btn-sm" href="{{route('perpanjangShow',['id' => $d->uuid])}}"> <i class="fa fa-window-close"> Tidak Diverifikasi </i> </a>
                                            @endif
                                            @else
                                            <a class="btn btn-outline-warning btn-sm" href="{{route('perpanjangShow',['id' => $d->uuid])}}"> <i class="fa fa-refresh"> Perpanjang Masa Cuti</i> </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Row-->
                <div class="overlay toggle-menu"></div>
            </div>
            <!-- End container-fluid-->
        </div>
        @include('admin.perpanjang.cetaktgl')
        @endsection
        @section('script')
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/jszip.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{url('template/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                //Default data table
                $('#default-datatable').DataTable();
            });
        </script>
        @endsection
