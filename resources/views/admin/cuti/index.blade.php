@extends('layouts.main')
@section('title') Data Pengusulan Cuti @endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-12">
                <h4 class="page-title">Data Pengusulan Cuti</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pengusulan Cuti</li>
                </ol>
            </div>
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Data Pengusulan Cuti
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
                                        <th>Jenis Cuti</th>
                                        <th>Lama Cuti</th>
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
                                        <td>@if($d->jenis_cuti == 1) Cuti Tahunan @elseif($d->jenis_cuti == 2 ) Cuti Nikah @elseif($d->jenis_cuti == 3 ) Cuti Sakit @elseif($d->jenis_cuti == 4 ) Cuti Bersalin @elseif($d->jenis_cuti == 5 ) Cuti Karena Alasan Penting @else - @endif</td>
                                        <td>{{carbon\carbon::parse($d->mulai_cuti)->translatedformat('d F Y')}} s/d {{carbon\carbon::parse($d->akhir_cuti)->translatedformat('d F Y')}}</td>
                                        <td>{{$d->keterangan}}</td>
                                        <td>@if($d->status == 1) Terverifikasi @elseif($d->status == 2 )Tidak Diverifikasi @else Belum Diverifikasi @endif </td>
                                        <td>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-status="{{$d->status}}" data-keterangan="{{$d->keterangan}}" data-akhir_cuti="{{$d->akhir_cuti}}" data-mulai_cuti="{{$d->mulai_cuti}}" data-pegawai_id="{{$d->pegawai_id}}" data-jenis_cuti="{{$d->jenis_cuti}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
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
@include('admin.cuti.create')
@include('admin.cuti.edit')
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
        let jenis_cuti = button.data('jenis_cuti')
        let mulai_cuti = button.data('mulai_cuti')
        let akhir_cuti = button.data('akhir_cuti')
        let keterangan = button.data('keterangan')
        let status = button.data('status')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #pegawai_id').val(pegawai_id);
        modal.find('.modal-body #jenis_cuti').val(jenis_cuti);
        modal.find('.modal-body #mulai_cuti').val(mulai_cuti);
        modal.find('.modal-body #akhir_cuti').val(akhir_cuti);
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
                    url: "{{url('/admin/cuti/delete')}}" + '/' + id,
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
