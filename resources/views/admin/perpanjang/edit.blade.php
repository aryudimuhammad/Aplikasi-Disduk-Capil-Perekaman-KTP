<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Edit Data Unit Kerja</b></h1>
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
                        <label for="cuti_id">Pilih Pegawai</label>
                        <select name="cuti_id" id="cuti_id" class="form-control">
                            @foreach($cuti as $d)
                            <option value="{{$d->id}}" @if (old('cuti_id')==$d->cuti_id ) {{'selected'}} @endif>@if($d->jenis_cuti == 3) Sakit @else Bersalin @endif</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mulai">Tambah Masa Cuti</label>
                        <div id="dateragne-picker">
                            <div class="input-daterange input-group">
                                <input type="date" class="form-control" name="mulai" id="mulai">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">to</span>
                                </div>
                                <input type="date" class="form-control" name="akhir" id="akhir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pict">Bukti</label>
                        <input type="file" name="pict" id="pict" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">{{old('keterangan')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if (old('status')==1 ){{'selected'}} @endif> Verifikasi</option>
                            <option value="2" @if (old('status')==2 ){{'selected'}} @endif> Tidak Diverifikasi</option>
                        </select>
                    </div>
                    <div class="form-group imgView">
                        <div class="col-sm-6 float-left">
                            <img src="/images/nopict.png" id="pict" class="card-img-top img-fluid" style="width: 70%; height:70%; display: block; margin: auto;">
                        </div>
                        <div class="col-sm-6 float-right">
                            <img src="/images/nopict.png" id="gambar_nodin" class="card-img-top img-fluid" style="width: 70%; height:70%; display: block; margin: auto;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 150px;">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
