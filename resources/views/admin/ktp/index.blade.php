@extends('layouts.main')
@section('title') Data Pendaftaran KTP @endsection
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
                <h4 class="page-title">Data Pendaftaran KTP</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran KTP</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Pendaftaran KTP
                        <div class="btn-group float-sm-right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="{{route('ktpCetak')}}" target="_blank" class="dropdown-item">Keseluruhan</a>
                                <button data-toggle="modal" data-target="#modalcetaktgl" class="dropdown-item">Cetak Berdasarkan Tanggal Daftar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Permohonan</th>
                                        <th>Foto KTP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>KK</th>
                                        <th>NIK</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>@if($d->permohonan == 1) Baru @elseif($d->permohonan == 2) Perpanjangan @elseif($d->permohonan == 3 ) Pergantian @else - @endif</td>
                                        <td class="text-center"><img src="/foto/{{$d->foto}}" alt="foto" class="customer-img" style="border-radius: 10%;" width="80%;" height="100%;"></td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->kk}}</td>
                                        <td>{{$d->nik}}</td>
                                        <td>@if($d->status_ktp == 1) <button class="btn btn-outline-warning btn-sm" data-id="{{$d->uuid}}" data-status="{{$d->status_ktp}}" data-keterangan="{{$d->keterangan}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-bell-o"></i> Belum Diverifikasi</button> @elseif($d->status_ktp == 2) <button class="btn btn-outline-primary btn-sm" data-id="{{$d->uuid}}" data-status="{{$d->status_ktp}}" data-keterangan="{{$d->keterangan}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-check-circle-o"></i> Terverifikasi</button> @elseif($d->status_ktp == 3) <button class="btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}" data-status="{{$d->status_ktp}}" data-keterangan="{{$d->keterangan}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-window-close-o"></i> Tidak Diverifikasi</button> @else <button class="btn btn-outline-success btn-sm" data-id="{{$d->uuid}}" data-status="{{$d->status}}" data-keterangan="{{$d->keterangan}}" data-toggle="modal" data-target="#modalstatus"> <i class="fa fa-check-square-o"></i> Selesai </button> @endif </td>
                                        <td>@if($d->keterangan == null) - @else {{$d->keterangan}} @endif </td>
                                        <td>
                                            <a class="btn btn-outline-info btn-sm" href="{{route('ktpShow',['id' => $d->uuid])}}"> <i class="fa fa-search"> </i> Detail</a>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->uuid}}" data-permohonan="{{$d->permohonan}}" data-nama="{{$d->nama}}" data-kk="{{$d->kk}}" data-nik="{{$d->nik}}" data-jk="{{$d->jk}}" data-agama="{{$d->agama}}" data-tempat_lahir="{{$d->tempat_lahir}}" data-tgl_lahir="{{$d->tgl_lahir}}" data-status="{{$d->status}}" data-alamat="{{$d->alamat}}" data-rt="{{$d->rt}}" data-rw="{{$d->rw}}" data-kewarganegaraan="{{$d->kewarganegaraan}}" data-goldar="{{$d->goldar}}" data-pekerjaan="{{$d->pekerjaan}}" data-pict="{{$d->foto}}" data-email="{{$d->email}}" data-keterangan="{{$d->keterangan}}" data-status_ktp="{{$d->status_ktp}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit"> </i> Edit</button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash"> </i> Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
        <div class="overlay toggle-menu"></div>
    </div>
    <!-- End container-fluid-->
</div>
@include('admin.ktp.cetaktgl')
@include('admin.ktp.create')
@include('admin.ktp.edit')
@include('admin.ktp.status')
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
        let permohonan = button.data('permohonan')
        let nama = button.data('nama')
        let kk = button.data('kk')
        let nik = button.data('nik')
        let jk = button.data('jk')
        let agama = button.data('agama')
        let tempat_lahir = button.data('tempat_lahir')
        let tgl_lahir = button.data('tgl_lahir')
        let status = button.data('status')
        let alamat = button.data('alamat')
        let rt = button.data('rt')
        let rw = button.data('rw')
        let kewarganegaraan = button.data('kewarganegaraan')
        let goldar = button.data('goldar')
        let pekerjaan = button.data('pekerjaan')
        let pict = button.data('pict')
        let email = button.data('email')
        let keterangan = button.data('keterangan')
        let status_ktp = button.data('status_ktp')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #permohonan').val(permohonan);
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #kk').val(kk);
        modal.find('.modal-body #nik').val(nik);
        modal.find('.modal-body #jk').val(jk);
        modal.find('.modal-body #agama').val(agama);
        modal.find('.modal-body #tempat_lahir').val(tempat_lahir);
        modal.find('.modal-body #tgl_lahir').val(tgl_lahir);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #rt').val(rt);
        modal.find('.modal-body #rw').val(rw);
        modal.find('.modal-body #kewarganegaraan').val(kewarganegaraan);
        modal.find('.modal-body #goldar').val(goldar);
        modal.find('.modal-body #pekerjaan').val(pekerjaan);
        modal.find('.modal-body #pict').attr('src', '/foto/' + pict);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #keterangan').val(keterangan);
        modal.find('.modal-body #status_ktp').val(status_ktp);
    })
</script>

<script>
    $('#modalstatus').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)
        let id = button.data('id')
        let status = button.data('status')
        let keterangan = button.data('keterangan')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #keterangan').val(keterangan);
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
                    url: "{{url('/admin/ktp/delete')}}" + '/' + id,
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
    $("#foto").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#foto").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#foto").val();
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
