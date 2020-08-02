<div class="modal fade" id="modaledit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Edit Data Pegawai</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    {{ method_field('put') }}
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" value="{{old('nik')}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Instansi Kerja" value="{{old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="instansi">Instansi Kerja</label>
                        <select class="form-control" id="instansi" name="instansi">
                            @foreach($instansi as $d)
                            <option value="{{$d->id}}" @if (old('instansi')==$d->id ) {{ 'selected' }} @endif>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit Kerja</label>
                        <select class="form-control" id="unit" name="unit">
                            @foreach($unit as $d)
                            <option value="{{$d->id}}" @if (old('unit')==$d->id ) {{ 'selected' }} @endif>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan Kerja</label>
                        <select class="form-control" id="satuan" name="satuan">
                            @foreach($satuan as $d)
                            <option value="{{$d->id}}" @if (old('satuan')==$d->id ) {{ 'selected' }} @endif>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <select class="form-control" id="golongan" name="golongan">
                            @foreach($golongan as $d)
                            <option value="{{$d->id}}" @if (old('golongan')==$d->id ) {{ 'selected' }} @endif>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            @foreach($jabatan as $d)
                            <option value="{{$d->id}}" @if (old('jabatan')==$d->id ) {{ 'selected' }} @endif>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Masukkan Tanggal Masuk" value="{{old('tgl_masuk')}}">
                    </div>
                    <label>Jenis Kelamin</label>
                    <div class="form-group">
                        <select class="form-control" id="jk" name="jk">
                            <option value="1" @if (old('jk')=='1' ) {{ 'selected' }} @endif>Laki-Laki</option>
                            <option value="2" @if (old('jk')=='2' ) {{ 'selected' }} @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="goldar">Golongan Darah</label>
                        <select class="form-control" name="goldar" id="goldar">
                            <option value="1" @if (old('goldar')=='1' ) {{'selected'}} @endif>A</option>
                            <option value="2" @if (old('goldar')=='2' ) {{'selected'}} @endif>B</option>
                            <option value="3" @if (old('goldar')=='3' ) {{'selected'}} @endif>AB</option>
                            <option value="4" @if (old('goldar')=='4' ) {{'selected'}} @endif>O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <option value="1" @if (old('agama')=='1' ) {{'selected'}} @endif>Islam</option>
                            <option value="2" @if (old('agama')=='2' ) {{'selected'}} @endif>Kristen Protestan</option>
                            <option value="3" @if (old('agama')=='3' ) {{'selected'}} @endif>Katolik</option>
                            <option value="4" @if (old('agama')=='4' ) {{'selected'}} @endif>Hindu</option>
                            <option value="5" @if (old('agama')=='5' ) {{'selected'}} @endif>Buddha</option>
                            <option value="6" @if (old('agama')=='6' ) {{'selected'}} @endif>Kong Hu Cu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1" @if (old('status')=='1' ) {{'selected'}} @endif>Lajang</option>
                            <option value="2" @if (old('status')=='2' ) {{'selected'}} @endif>Kawin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="kodepoos">Kode Pos</label>
                        <input type="text" class="form-control" id="kodepoos" name="kodepoos" placeholder="Masukkan Kode Pos" value="{{old('kodepoos')}}">
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor HP</label>
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Kode Pos" value="{{old('telp')}}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" value="{{old('tgl_lahir')}}">
                    </div>
                    <h6 class="form-group">Tempat lahir</h6>
                    <div class="form-group">
                        <textarea class="form-control" id="tempat_lahir" name="tempat_lahir" rows="3" placeholder="Masukkan Tempat lahir">{{old('tempat_lahir')}}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Ubah</button>
            </div>
        </div>
    </div>
</div>
