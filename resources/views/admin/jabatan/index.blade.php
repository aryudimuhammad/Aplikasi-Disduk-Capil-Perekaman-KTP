@extends('layouts.main')
@section('title') Data Jabatan @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Jabatan</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Jabatan</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Jabatan
                        <div class="btn-group float-sm-right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="{{route('jabatanCetak')}}" target="_blank" class="dropdown-item">Keseluruhan</a>
                                <button data-toggle="modal" data-target="#modalcetaknama" class="dropdown-item">Cetak Berdasarkan Nama Jabatan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Jabatan</th>
                                        <th>Nama Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->kode}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-kode="{{$d->kode}}" data-nama="{{$d->nama}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
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
@include('admin.jabatan.cetaknama')
@include('admin.jabatan.create')
@include('admin.jabatan.edit')
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
        let kode = button.data('kode')
        let nama = button.data('nama')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #kode').val(kode);
        modal.find('.modal-body #nama').val(nama);
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
                    url: "{{url('/admin/jabatan/delete')}}" + '/' + id,
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
