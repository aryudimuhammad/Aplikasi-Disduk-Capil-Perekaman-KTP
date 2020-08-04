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
                        @if(auth()->user()->role == 2)
                        <input type="text" class="form-control" readonly value="{{auth()->user()->name}}">
                        @else
                        <label for="pegawai_id">Pilih Pegawai</label>
                        <select name="pegawai_id" id="pegawai_id" class="form-control">
                            @foreach($pegawai as $d)
                            <option value="{{$d->id}}" @if (old('pegawai_id')==$d->id ) {{'selected'}} @endif>{{$d->user->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jenis_cuti">Pilih Jenis Cuti</label>
                        <select name="jenis_cuti" id="jenis_cuti" class="form-control">
                            <option value="1" @if (old('jenis_cuti')==1 ) {{'selected'}} @endif>Cuti Tahunan</option>
                            <option value="2" @if (old('jenis_cuti')==2 ) {{'selected'}} @endif>Cuti Nikah</option>
                            <option value="3" @if (old('jenis_cuti')==3 ) {{'selected'}} @endif>Cuti Sakit</option>
                            <option value="4" @if (old('jenis_cuti')==4 ) {{'selected'}} @endif>Cuti Bersalin</option>
                            <option value="5" @if (old('jenis_cuti')==5 ) {{'selected'}} @endif>Cuti Karena Alasan Penting</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mulai_cuti">Lama Cuti</label>
                        <div id="dateragne-picker">
                            <div class="input-daterange input-group">
                                <input type="date" class="form-control" name="mulai_cuti" id="mulai_cuti">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">to</span>
                                </div>
                                <input type="date" class="form-control" name="akhir_cuti" id="akhir_cuti">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">{{old('keterangan')}}</textarea>
                    </div>
                    @if(auth()->user()->role == 1)
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if (old('status')==1 ){{'selected'}} @endif> Verifikasi</option>
                            <option value="2" @if (old('status')==2 ){{'selected'}} @endif> Tidak Diverifikasi</option>
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
