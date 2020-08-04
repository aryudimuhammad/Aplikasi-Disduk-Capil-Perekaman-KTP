<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Edit Data Pengusulan Pensiun</b></h1>
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
                        <label for="pegawai_id">Pilih Pegawai</label>
                        @if(auth()->user()->role == 1)
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            @foreach($pegawai as $d)
                            <option value="{{$d->id}}" @if (old('pegawai_id')==$d->id ){{'selected'}} @endif>{{$d->user->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" readonly class="form-control" value="{{auth()->user()->name}}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis_pensiun">Pilih Jenis Pensiun</label>
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
                        <label for="status_berkas">Pilih Status Berkas</label>
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
                    @if(auth()->user()->role == 1)
                    <div class="form-group">
                        <label for="status">Pilih Status Verifikasi</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if (old('status')==1 ){{'selected'}} @endif>Verifikasi</option>
                            <option value="2" @if (old('status')==2 ){{'selected'}} @endif>Tidak Diverifikasi</option>
                        </select>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
