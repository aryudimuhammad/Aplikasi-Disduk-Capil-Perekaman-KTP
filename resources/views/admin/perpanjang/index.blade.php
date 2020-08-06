@extends('layouts.main')
@section('title') Data Perpanjang Masa Cuti @endsection
@section('link')
<style>
    #imgView {
        width: 100%;
        height: 100%;
    }

    #gambar_nodin {
        width: 100%;
        height: 100%;
    }

    .loadAnimate {
        animation: setAnimate ease 2.5s infinite;
    }

    @keyframes setAnimate {
        0% {
            color: #000;
        }

        50% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Perpanjang Masa Cuti</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Perpanjang Masa Cuti</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Perpanjang Masa Cuti
                        <div class="btn-group float-sm-right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item">Keseluruhan</a>
                                <a href="javaScript:void();" class="dropdown-item">Cetak Berdasarkan</a>
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->role == 2)
                    @if($cutifirst == !null)
                    @if($cutifirst->jenis_cuti == 3 && 4 )
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Bukti</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tambah Masa Cuti</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(auth()->user()->role == 2)
                                    @foreach($datarole2 as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->cuti->pegawai->nip}}</td>
                                        <td>{{$d->cuti->pegawai->user->name}}</td>
                                        <td>{{$d->bukti}}</td>
                                        <td>@if($d->cuti->jenis_cuti == 3 ) Cuti Sakit @elseif($d->cuti->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                                        <td>{{carbon\carbon::parse($d->mulai)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Terverifikasi @elseif($d->status == 2 )Tidak Diverifikasi @else Belum Diverifikasi @endif </td>
                                        <td>
                                            @if($d->status == 1)
                                            <button class="btn btn-outline-success btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-check-square"> </i> Terverifikasi</button>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            @else
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->cuti->pegawai->nip}}</td>
                                        <td>{{$d->cuti->pegawai->user->name}}</td>
                                        <td>{{$d->bukti}}</td>
                                        <td>@if($d->cuti->jenis_cuti == 3 ) Cuti Sakit @elseif($d->cuti->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                                        <td>{{carbon\carbon::parse($d->mulai)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Terverifikasi @elseif($d->status == 2 )Tidak Diverifikasi @else Belum Diverifikasi @endif </td>
                                        <td>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                    @else
                    <div style="margin-top: 450px;"></div>
                    <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
                        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
                            <div class="swal2-header">
                                <ul class="swal2-progress-steps" style="display: none;"></ul>
                                <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                                        <span class="swal2-x-mark-line-left"></span>
                                        <span class="swal2-x-mark-line-right"></span>
                                    </span>
                                </div>
                                <div class="swal2-icon swal2-question" style="display: none;"></div>
                                <div class="swal2-icon swal2-warning" style="display: none;"></div>
                                <div class="swal2-icon swal2-info" style="display: none;"></div>
                                <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;">
                                <h2 class="swal2-title" id="swal2-title" style="display: flex;">Oops...</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                            </div>
                            <div class="swal2-content">
                                <div id="swal2-content" class="swal2-html-container" style="display: block;">Anda Tidak Memiliki Cuti Sakit Atau Cuti Bersalin!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
                                <div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select>
                                <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea>
                                <div class="swal2-validation-message" id="swal2-validation-message"></div>
                            </div>
                            <div class="swal2-actions"><a href="{{route('home')}}" class="btn btn-danger">Kembali</a></div>
                            <div class="swal2-timer-progress-bar-container">
                                <div class="swal2-timer-progress-bar" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div style="margin-top: 450px;"></div>
                    <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
                        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
                            <div class="swal2-header">
                                <ul class="swal2-progress-steps" style="display: none;"></ul>
                                <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                                        <span class="swal2-x-mark-line-left"></span>
                                        <span class="swal2-x-mark-line-right"></span>
                                    </span>
                                </div>
                                <div class="swal2-icon swal2-question" style="display: none;"></div>
                                <div class="swal2-icon swal2-warning" style="display: none;"></div>
                                <div class="swal2-icon swal2-info" style="display: none;"></div>
                                <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;">
                                <h2 class="swal2-title" id="swal2-title" style="display: flex;">Oops...</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                            </div>
                            <div class="swal2-content">
                                <div id="swal2-content" class="swal2-html-container" style="display: block;">Anda Tidak Memiliki Cuti Sakit Atau Cuti Bersalin!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
                                <div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select>
                                <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea>
                                <div class="swal2-validation-message" id="swal2-validation-message"></div>
                            </div>
                            <div class="swal2-actions"><a href="{{route('home')}}" class="btn btn-danger">Kembali</a></div>
                            <div class="swal2-timer-progress-bar-container">
                                <div class="swal2-timer-progress-bar" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Bukti</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tambah Masa Cuti</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(auth()->user()->role == 2)
                                    @foreach($datarole2 as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->cuti->pegawai->nip}}</td>
                                        <td>{{$d->cuti->pegawai->user->name}}</td>
                                        <td>{{$d->bukti}}</td>
                                        <td>@if($d->cuti->jenis_cuti == 3 ) Cuti Sakit @elseif($d->cuti->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                                        <td>{{carbon\carbon::parse($d->mulai)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Belum Diverifikasi @elseif($d->status == 2 ) Terverifikasi @else Tidak Diverifikasi @endif </td>
                                        <td>
                                            @if($d->status == 1)
                                            <button class="btn btn-outline-success btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-check-square"> </i> Terverifikasi</button>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            @else
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->cuti->pegawai->nip}}</td>
                                        <td>{{$d->cuti->pegawai->user->name}}</td>
                                        <td class="text-center"><img src="{{url('bukti/'.$d->bukti.'')}}" alt="bukti" class="customer-img" style="border-radius: 10%;" width="80px;" height="8 0px;"></td>
                                        <td>@if($d->cuti->jenis_cuti == 3 ) Cuti Sakit @elseif($d->cuti->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                                        <td>{{carbon\carbon::parse($d->mulai)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Belum Diverifikasi @elseif($d->status == 2 ) Terverifikasi @else Tidak Diverifikasi @endif </td>
                                        <td>
                                            <button class="btn btn-outline-info btn-sm" data-id="{{$d->uuid}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-edit">Ubah Status</i> </button>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-cuti_id="{{$d->cuti_id}}" data-mulai="{{$d->mulai}}" data-akhir="{{$d->akhir}}" data-pict="{{$d->bukti}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- End Row-->
        <div class="overlay toggle-menu"></div>
    </div>
    <!-- End container-fluid-->
</div>
@include('admin.perpanjang.create')
@include('admin.perpanjang.edit')
@include('admin.perpanjang.status')
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
    $('#modaledit').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let cuti_id = button.data('cuti_id')
        let pict = button.data('pict')
        let mulai = button.data('mulai')
        let akhir = button.data('akhir')
        let keterangan = button.data('keterangan')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #cuti_id').val(cuti_id);
        modal.find('.modal-body #pict').attr('src', '/bukti/' + pict);
        modal.find('.modal-body #mulai').val(mulai);
        modal.find('.modal-body #akhir').val(akhir);
        modal.find('.modal-body #keterangan').val(keterangan);
    })
</script>

<script>
    $('#modalstatus').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let status = button.data('status')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #status').val(status);
    })
</script>

<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();
    });
</script>

<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal.fire({
            title: "Apakah anda yakin?",
            icon: "warning",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('/admin/perpanjang/cuti/delete')}}" + '/' + id,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            document.location.reload(true);
                        }, 1000);
                    },
                })
            } else if (result.dismiss === swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'data batal dihapus',
                    'error'
                )
            }
        })
    });
</script>

<script>
    $("#bukti").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#bukti").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#bukti").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }
</script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#gambar_nodin').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#pict").change(function() {
        bacaGambar(this);
    });
</script>
@endsection
