<div class="modal fade" id="modalstatus">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Ubah Status Perpanjang Cuti</b></h1>
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
                        <label for="status">Pilih Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2" @if (old('status')==1 ){{'selected'}} @endif>Verifikasi</option>
                            <option value="3" @if (old('status')==2 ){{'selected'}} @endif>Tidak Diverifikasi</option>
                        </select>
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
