<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Edit Data Golongan</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    {{ method_field('put') }}
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="kode">Kode Golongan</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Golongan" value="{{old('kode')}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Golongan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Golongan" value="{{old('nama')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
