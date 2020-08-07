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
                    <li class="breadcrumb-item"><a href="{{route('perpanjangIndex')}}">Data Masa Cuti Aktif</a></li>
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
                        <a class="btn btn-outline-danger btn-sm float-right" href="{{route('perpanjangIndex')}}"> <i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($cuti->perpanjang_id == !null && $perpanjang == !null)
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jenis Cuti</th>
                                        <th>Tanggal Masa Cuti</th>
                                        <th>Surat Keterangan Dokter</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->pegawai->nip}}</td>
                                        <td>{{$d->pegawai->user->name}}</td>
                                        <td>@if($d->jenis_cuti == 3 ) Cuti Sakit @elseif($d->jenis_cuti == 4 ) Cuti Bersalin @else - @endif</td>
                                        <td class="text-center"><img src="{{url('bukti/'.$d->perpanjang->bukti.'')}}" alt="bukti" class="customer-img" style="border-radius: 10%;" width="80px;" height="8 0px;"></td>
                                        <td>{{carbon\carbon::parse($d->perpanjang->mulai)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->perpanjang->akhir)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->perpanjang->keterangan}}</td>
                                        <td>@if($d->perpanjang->status == 1) Belum Diverifikasi @elseif($d->perpanjang->status == 2 ) Terverifikasi @else Tidak Diverifikasi @endif </td>
                                        <td>
                                            @if(Auth()->user()->role == 1)
                                            <button class="btn btn-outline-info btn-sm" data-id="{{$d->perpanjang->uuid}}" data-status="{{$d->perpanjang->status}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-edit">Ubah Status</i> </button>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->perpanjang_id}}" data-cuti_id="{{$d->pegawai->user->name}}" data-mulai="{{$d->perpanjang->mulai}}" data-akhir="{{$d->perpanjang->akhir}}" data-pict="{{$d->perpanjang->bukti}}" data-keterangan="{{$d->perpanjang->keterangan}}" data-status="{{$d->perpanjang->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$cuti->uuid}}" data-uuid="{{$d->perpanjang->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                            @else
                                            @if($d->perpanjang->status == 1)
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->perpanjang_id}}" data-cuti_id="{{$d->pegawai->user->name}}" data-mulai="{{$d->perpanjang->mulai}}" data-akhir="{{$d->perpanjang->akhir}}" data-pict="{{$d->perpanjang->bukti}}" data-keterangan="{{$d->perpanjang->keterangan}}" data-status="{{$d->perpanjang->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$cuti->uuid}}" data-uuid="{{$d->perpanjang->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                            @elseif($d->perpanjang->status == 2)
                                            <button class="btn btn-outline-success btn-sm"> <i class="fa fa-check-square"> Telah Diverifikasi</i> </button>
                                            @else
                                            <button class="btn btn-outline-danger btn-sm"> <i class="fa fa-window-close"> Tidak Diverifikasi</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$cuti->uuid}}" data-uuid="{{$d->perpanjang->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <button class="btn btn-primary btn-sm" data-mulai="{{$cuti->akhir_cuti}}" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data Perpanjang Masa Cuti </button>
                            @endif
                        </div>
                    </div>
                </div><!-- End Row-->
                <div class="overlay toggle-menu"></div>
            </div>
            <!-- End container-fluid-->
        </div>
    </div>
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
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();
    });
</script>

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
    $('#modaltambah').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let mulai = button.data('mulai')
        let modal = $(this)

        modal.find('.modal-body #mulai').val(mulai);
    })
</script>

<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var uuid = $(this).data('uuid');
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
                    url: "{{url('/admin/perpanjang/masa/cuti')}}" + '/' + id + '/' + uuid,
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
