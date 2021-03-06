<div class="modal fade" id="modaltambah">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Tambah Data Pengusulan Pensiun</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="pegawai_id">Pilih Pegawai</label>
                        @if(auth()->user()->role == 1)
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            @foreach($pegawai as $d)
                            <option value="{{$d->id}}" @if (old('pegawai_id')==$d->id ){{'selected'}} @endif>{{$d->user->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" readonly class="form-control" value="{{auth()->user()->name}}">
                        <input type="hidden" id="pegawai_id" name="pegawai_id" value="{{auth()->user()->pegawai->id}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis_pensiun">Pilih Status</label>
                        <select name="jenis_pensiun" id="jenis_pensiun" class="form-control">
                            <option value="1" @if (old('jenis_pensiun')==1 ){{'selected'}} @endif>Batas Usia Pensiun</option>
                            <option value="2" @if (old('jenis_pensiun')==2 ){{'selected'}} @endif>Atas Permintaan Sendiri</option>
                            <option value="3" @if (old('jenis_pensiun')==3 ){{'selected'}} @endif>Duda</option>
                            <option value="4" @if (old('jenis_pensiun')==4 ){{'selected'}} @endif>Janda</option>
                            <option value="5" @if (old('jenis_pensiun')==5 ){{'selected'}} @endif>Meninggal Dunia</option>
                            <option value="6" @if (old('jenis_pensiun')==6 ){{'selected'}} @endif>Yatim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_berkas">Pilih Berkas</label>
                        <select name="status_berkas" id="status_berkas" class="form-control">
                            <option value="1" @if (old('status_berkas')==1 ){{'selected'}} @endif>Proses BKD</option>
                            <option value="2" @if (old('status_berkas')==2 ){{'selected'}} @endif>Proses BKD BTL</option>
                            <option value="3" @if (old('status_berkas')==3 ){{'selected'}} @endif>Proses BKN</option>
                            <option value="4" @if (old('status_berkas')==4 ){{'selected'}} @endif>Proses BKN BTL</option>
                            <option value="5" @if (old('status_berkas')==5 ){{'selected'}} @endif>Masih Pertek</option>
                            <option value="6" @if (old('status_berkas')==6 ){{'selected'}} @endif>Proses TTD Gurbernur</option>
                            <option value="7" @if (old('status_berkas')==7 ){{'selected'}} @endif>SDK Pensiun Sudah Jadi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">{{old('keterangan')}}</textarea>
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
