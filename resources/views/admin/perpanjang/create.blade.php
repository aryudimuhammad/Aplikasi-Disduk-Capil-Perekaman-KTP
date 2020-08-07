<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Perpanjang Masa Cuti</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="cuti_id" id="cuti_id" value="{{$cuti->id}}">
                    <div class="form-group">
                        <label for="cuti_id">Nama Pegawai</label>
                        <input type="text" readonly class="form-control" value="{{$cuti->pegawai->user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="mulai">Tambah Masa Cuti</label>
                        <div id="dateragne-picker">
                            <div class="input-daterange input-group">
                                <input type="date" readonly class="form-control" name="mulai" id="mulai">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">to</span>
                                </div>
                                <input type="date" class="form-control" name="akhir" id="akhir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">{{old('keterangan')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti / Surat Keterangan Dokter</label>
                        <input type="file" name="bukti" id="bukti" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="/images/nopict.png" id="imgView" class="card-img-top img-fluid" style="width: 30%; height: 30%; display: block; margin: auto;">
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
