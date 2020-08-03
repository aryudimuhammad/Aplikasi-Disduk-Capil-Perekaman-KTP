<div class="modal fade" id="modaledit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Edit Data KTP</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    {{ method_field('put') }}
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="permohonan">Permohonan KTP</label>
                                <select class="form-control" name="permohonan" id="permohonan">
                                    <option value="1" @if (old('permohonan')=='1' ) {{'selected'}} @endif>Baru</option>
                                    <option value="2" @if (old('permohonan')=='2' ) {{'selected'}} @endif>Perpanjangan</option>
                                    <option value="3" @if (old('permohonan')=='3' ) {{'selected'}} @endif>Penggantian</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="kk">No. KK</label>
                                <input type="number" class="form-control form-control-user" id="kk" name="kk" placeholder="Masukkan Nomor Kartu Keluarga" maxlength="16">
                            </div>
                            <div class="col-sm-6">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan Nomor NIK" maxlength="16">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Masukkan Email" class="form-control form-control-user" id="email" name="email">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option value="1" @if (old('jk')=='1' ) {{'selected'}} @endif>Laki-Laki</option>
                                    <option value="2" @if (old('jk')=='2' ) {{'selected'}} @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Kota Anda Lahir">
                            </div>
                            <div class="col-sm-6">
                                <label for="tgl_lahir">Tgl Lahir</label>
                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" @if (old('status')=='1' ) {{'selected'}} @endif>Lajang</option>
                                    <option value="2" @if (old('status')=='2' ) {{'selected'}} @endif>Kawin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat Rumah"></textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control form-control-user" id="rt" name="rt" placeholder="RT">
                            </div>
                            <div class="col-sm-3">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control form-control-user" id="rw" name="rw" placeholder="RW">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 float-left">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control form-control-user" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                            </div>
                            <div class="col-sm-6">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" class="form-control form-control-user" id="kewarganegaraan" name="kewarganegaraan" placeholder="WNI">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="goldar">Golongan Darah</label>
                                <select class="form-control" name="goldar" id="goldar">
                                    <option value="1" @if (old('goldar')=='1' ) {{'selected'}} @endif>A</option>
                                    <option value="2" @if (old('goldar')=='2' ) {{'selected'}} @endif>B</option>
                                    <option value="3" @if (old('goldar')=='3' ) {{'selected'}} @endif>AB</option>
                                    <option value="4" @if (old('goldar')=='4' ) {{'selected'}} @endif>O</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="pict">Foto</label>
                                <input type="file" name="pict" id="pict" class="form-control" onchange="document.getElementById('pict').value = this.value;" aria-describedby="pict" value="{{old('pict')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 float-right">
                        <div class="col-sm-12">
                            <img src="/images/nopict.png" id="pict" class="card-img-top img-fluid" style="width: 70%; height:70%; display: block; margin: auto; margin-top:13px;">
                        </div>
                        <div class="col-sm-12">
                            <img src="/images/nopict.png" id="gambar_nodin" class="card-img-top img-fluid" style="width: 70%; height:70%; display: block; margin: auto; margin-top:20px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer col-md-12">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
