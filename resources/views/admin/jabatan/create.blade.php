<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Tambah Data Jabatan</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode Jabatan</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Jabatan" value="{{old('kode')}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Jabatan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jabatan" value="{{old('nama')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
