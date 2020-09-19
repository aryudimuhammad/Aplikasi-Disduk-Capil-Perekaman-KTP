<div class="modal fade" id="modalstatus">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Ubah Status KTP</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Pilih Status</option>
                            <option value="2">Verifikasi</option>
                            <option value="3">Tidak Diverifikasi</option>
                            <option value="4">Bisa Diambil</option>
                            <option value="5">Sudah Diambil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input placeholder="Masukkan Keterangan Jika Terjadi Kesalahan Data." class="form-control" id="nomor" name="nomor" value="{{old('nomor')}}">
                        <p>Note : Masukkan Nomor Jika Memverifikasi KTP Permohonan Baru.</p>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea placeholder="Masukkan Keterangan Jika Terjadi Kesalahan Data." class="form-control" id="keterangan" name="keterangan">{{old('keterangan')}}</textarea>
                        <p>Note : Masukkan Keterangan Jika Terjadi Kesalahan Data.</p>
                    </div>
                </div>
                <div class="modal-footer col-md-12">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
