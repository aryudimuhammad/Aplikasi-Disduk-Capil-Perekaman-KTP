@extends('layouts.main')
@section('title') Data Pengusulan Pensiun @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Pengusulan Pensiun</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pengusulan Pensiun</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Pengusulan Pensiun
                        <div class="btn-group float-sm-right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
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
                                        <th>Nama Pegawai</th>
                                        <th>Jenis Pensiun</th>
                                        <th>Status Berkas</th>
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
                                        <td>@if($d->jenis_pensiun == 1 ) Batas Usia Pensiun @elseif($d->jenis_pensiun == 2) Atas Permintaan Sendiri @elsif($d->jenis_pensiun == 3 ) Duda @elseif($d->jenis_pensiun == 4) Janda @elseif($d->jenis_pensiun == 5) Meninggal Dunia @else Yatim @endif</td>
                                        <td>@if($d->status_berkas ==1 ) Proses BKD @elseif($d->status_berkas == 2) Proses BKD BTL @elseif($d->status_berkas == 3) Proses BKN @elseif($d->status_berkas == 4) Proses BKN BTL @elseif($d->status_berkas == 5 ) Masih Pertek @elseif($d->status_berkas == 6 ) Proses TTD Gurbernur @else SK Pensiun Sudah Jadi @endif</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Terverifikasi @elseif($d->status == 2) Tidak Diverifikasi @else Belum Diverifikasi @endif </td>
                                        <td>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-pegawai_id="{{$d->pegawai_id}}" data-jenis_pensiun="{{$d->jenis_pensiun}}" data-status_berkas="{{$d->status_berkas}}" data-keterangan="{{$d->keterangan}}" data-status="{{$d->status}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
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
@include('admin.pensiun.create')
@include('admin.pensiun.edit')
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
        let pegawai_id = button.data('pegawai_id')
        let jenis_pensiun = button.data('jenis_pensiun')
        let status_berkas = button.data('status_berkas')
        let keterangan = button.data('keterangan')
        let status = button.data('status')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #pegawai_id').val(pegawai_id);
        modal.find('.modal-body #jenis_pensiun').val(jenis_pensiun);
        modal.find('.modal-body #status_berkas').val(status_berkas);
        modal.find('.modal-body #keterangan').val(keterangan);
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
                    url: "{{url('/admin/pensiun/delete')}}" + '/' + id,
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
