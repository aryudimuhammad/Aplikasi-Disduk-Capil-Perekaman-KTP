@extends('layouts.main')
@section('title') Data Pegawai @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Pegawai</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Pegawai
                        <div class="btn-group float-sm-right">
                            <button class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item">Keseluruhan</a>
                                <a href="javaScript:void();" class="dropdown-item">Cetak Berdasarkan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Instansi Kerja</th>
                                        <th>Unit Kerja</th>
                                        <th>Satuan Kerja</th>
                                        <th>Golongan</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nip}}</td>
                                        <td>{{$d->user->name}}</td>
                                        <td>{{$d->instansi->nama}}</td>
                                        <td>{{$d->unit->nama}}</td>
                                        <td>{{$d->satuan->nama}}</td>
                                        <td>{{$d->golongan->nama}}</td>
                                        <td>{{$d->jabatan->nama}}</td>
                                        <td>{{carbon\carbon::parse($d->tgl_masuk)->translatedformat('d F Y')}}</td>
                                        <td>
                                            <a href="{{route('pegawaiShow', ['id' => $d->uuid])}}" class="btn btn-outline-info btn-sm"> <i class="fa fa-search">Detail</i> </a>
                                            <button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
                                            <button class="delete btn btn-outline-danger btn-sm" data-id="{{$d->uuid}}"> <i class="fa fa-trash">Hapus</i> </button>
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
@include('admin.pegawai.create')
@include('admin.pegawai.edit')
@endsection
@section('script')
<!--Data Tables js-->
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
<!--Data Tables js-->

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
                    url: "{{url('/admin/pegawai/delete')}}" + '/' + id,
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
@endsection
