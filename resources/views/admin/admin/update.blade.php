<h5 class="mb-5">{{auth()->user()->name}} Profile</h5>
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Nama Lengkap</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="nama" value="{{auth()->user()->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Email</label>
        <div class="col-lg-9">
            <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Password</label>
        <div class="col-lg-9">
            <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
            <p>Note : Masukkan Password Jika Ingin Mengubah Password</p>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Konfirmasi</label>
        <div class="col-lg-9">
            <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password">
        </div>
    </div>
    @if(auth()->user()->role == 2)
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Tanggal Lahir</label>
        <div class="col-lg-9">
            <input class="form-control" type="date" name="tgl_lahir" value="{{auth()->user()->pegawai->tgl_lahir}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Tempat Lahir</label>
        <div class="col-lg-9">
            <textarea class="form-control" name="tempat_lahir">{{auth()->user()->pegawai->tempat_lahir}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Agama</label>
        <div class="col-lg-9">
            <select class="form-control" name="agama" id="agama">
                <option value="1" @if ( 'agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Islam</option>
                <option value="2" @if ('agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Kristen Protestan</option>
                <option value="3" @if ('agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Katolik</option>
                <option value="4" @if ('agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Hindu</option>
                <option value="5" @if ('agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Buddha</option>
                <option value="6" @if ('agama'==Auth()->user()->pegawai->agama ) {{'selected'}} @endif>Kong Hu Cu</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Jenis Kelamin</label>
        <div class="col-lg-9">
            <select class="form-control" name="jk" id="jk">
                <option value="1" @if ('jk'==Auth()->user()->pegawai->jk ) {{'selected'}} @endif>Laki - Laki</option>
                <option value="2" @if ('jk'==Auth()->user()->pegawai->jk ) {{'selected'}} @endif>Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Golongan Darah</label>
        <div class="col-lg-9">
            <select class="form-control" name="goldar" id="goldar">
                <option value="1" @if ('goldar'==Auth()->user()->pegawai->goldar ) {{'selected'}} @endif>A</option>
                <option value="2" @if ('goldar'==Auth()->user()->pegawai->goldar ) {{'selected'}} @endif>B</option>
                <option value="3" @if ('goldar'==Auth()->user()->pegawai->goldar ) {{'selected'}} @endif>AB</option>
                <option value="4" @if ('goldar'==Auth()->user()->pegawai->goldar ) {{'selected'}} @endif>O</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Status</label>
        <div class="col-lg-9">
            <select class="form-control" name="status" id="status">
                <option value="1" @if ('status'==Auth()->user()->pegawai->status ) {{'selected'}} @endif>Lajang</option>
                <option value="2" @if ('status'==Auth()->user()->pegawai->status ) {{'selected'}} @endif>Kawin</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Kependudukan</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" value="{{Auth()->user()->pegawai->kependudukan}}" placeholder="Kependudukan">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Nomor Telepon</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" value="{{Auth()->user()->pegawai->telp}}" placeholder="Nomor Telepon">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Alamat</label>
        <div class="col-lg-9">
            <textarea class="form-control" placeholder="Nomor Telepon">{{Auth()->user()->pegawai->alamat}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Kodepos</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" value="{{Auth()->user()->pegawai->kodepos}}" placeholder="Kependudukan">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
        <div class="col-lg-9">
            <input class="form-control" type="file">
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label"></label>
        <div class="col-lg-9">
            <button type="reset" class="btn btn-secondary"> Reset </button>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>
    </div>
</form>
