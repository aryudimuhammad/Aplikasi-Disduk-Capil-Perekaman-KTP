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
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaltambah"> <i class="fa fa-plus"> </i> Tambah Data</button> &emsp13;
                            <button type="button" class="btn btn-info waves-effect waves-info btn-sm float-right  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-haspopup="true" aria-expanded="true"><i class="fa fa-print mr-1"></i> Print</button>
                            <div class="dropdown-menu">
                                <a href="{{route('pegawaiCetak')}}" target="_blank" class="dropdown-item">Keseluruhan</a>
                                <button class="dropdown-item" data-toggle="modal" data-target="#modalcetaktgl">Cetak Berdasarkan Tanggal Masuk Pegawai</button>
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
                                        <!-- <th>Instansi Kerja</th> -->
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
                                        <!-- <td>{{$d->instansi->nama}}</td> -->
                                        <td>{{$d->unit->nama}}</td>
                                        <td>{{$d->satuan->nama}}</td>
                                        <td>{{$d->golongan->nama}}</td>
                                        <td>{{$d->jabatan->nama}}</td>
                                        <td>{{carbon\carbon::parse($d->tgl_masuk)->translatedformat('d F Y')}}</td>
                                        <td>
                                            <a href="{{route('pegawaiShow', ['id' => $d->uuid])}}" class="btn btn-outline-info btn-sm"> <i class="fa fa-search">Detail</i> </a>
                                            <button class="btn btn-outline-warning btn-sm" data-id="{{$d->id}}" data-nama="{{$d->user->name}}" data-instansi="{{$d->instansi->id}}" data-unit="{{$d->unit->id}}" data-satuan="{{$d->satuan->id}}" data-golongan="{{$d->golongan->id}}" data-jabatan="{{$d->jabatan->id}}" data-email="{{$d->user->email}}" data-tgl_masuk="{{$d->tgl_masuk}}" data-tgl_lahir="{{$d->tgl_lahir}}" data-tempat_lahir="{{$d->tempat_lahir}}" data-jk="{{$d->jk}}" data-agama="{{$d->agama}}" data-goldar="{{$d->goldar}}" data-status="{{$d->status}}" data-kependudukan="{{$d->kependudukan}}" data-alamat="{{$d->alamat}}" data-kodepos="{{$d->kodepos}}" data-telp="{{$d->telp}}" data-nip="{{$d->nip}}" data-toggle="modal" data-target="#modaledit"> <i class="fa fa-edit">Edit</i> </button>
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
    </div>
    <!-- End container-fluid-->
</div>
@include('admin.pegawai.create')
@include('admin.pegawai.edit')
@include('admin.pegawai.cetaktgl')
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
        let nama = button.data('nama')
        let nip = button.data('nip')
        let instansi = button.data('instansi')
        let unit = button.data('unit')
        let satuan = button.data('satuan')
        let golongan = button.data('golongan')
        let jabatan = button.data('jabatan')
        let tgl_masuk = button.data('tgl_masuk')
        let tgl_lahir = button.data('tgl_lahir')
        let tempat_lahir = button.data('tempat_lahir')
        let goldar = button.data('goldar')
        let status = button.data('status')
        let email = button.data('email')
        let kependudukan = button.data('kependudukan')
        let kodepos = button.data('kodepos')
        let jk = button.data('jk')
        let alamat = button.data('alamat')
        let telp = button.data('telp')
        let agama = button.data('agama')
        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #nip').val(nip);
        modal.find('.modal-body #instansi').val(instansi);
        modal.find('.modal-body #unit').val(unit);
        modal.find('.modal-body #satuan').val(satuan);
        modal.find('.modal-body #golongan').val(golongan);
        modal.find('.modal-body #jabatan').val(jabatan);
        modal.find('.modal-body #tgl_masuk').val(tgl_masuk);
        modal.find('.modal-body #tgl_lahir').val(tgl_lahir);
        modal.find('.modal-body #tempat_lahir').val(tempat_lahir);
        modal.find('.modal-body #goldar').val(goldar);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #kependudukan').val(kependudukan);
        modal.find('.modal-body #kodepos').val(kodepos);
        modal.find('.modal-body #jk').val(jk);
        modal.find('.modal-body #alamat').val(alamat);
        modal.find('.modal-body #agama').val(agama);
        modal.find('.modal-body #telp').val(telp);
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
