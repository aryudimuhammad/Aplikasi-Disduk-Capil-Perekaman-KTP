@extends('layouts.login')
@section('title') Pendaftaran KTP @endsection
@section('head')
<style>
    #imgView {
        width: 100%;
        height: 100%;
    }

    #gambar_nodin {
        width: 100%;
        height: 100%;
    }

    .loadAnimate {
        animation: setAnimate ease 2.5s infinite;
    }

    @keyframes setAnimate {
        0% {
            color: #000;
        }

        50% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #000;
        }
    }

    .custom-file-label {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="card" style="margin-top: 78px;">
    <div class="col-xl-12" style="margin-top:20px;">
        <div class="card mb-4">
            <div class="card-header">
                <h4> <b> Form Pendaftaran KTP </b> </h4>
            </div>
            <div class="card-body">
                <div id="notifikasi"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
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
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="{{old('nama')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="kk">No. KK</label>
                                <input type="number" class="form-control form-control-user" id="kk" name="kk" value="{{old('kk')}}" placeholder="Masukkan Nomor Kartu Keluarga" maxlength="16">
                            </div>
                            <div class="col-sm-6">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control form-control-user" id="nik" name="nik" value="{{old('nik')}}" placeholder="Masukkan Nomor NIK" maxlength="16">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Masukkan Email" class="form-control form-control-user" value="{{old('email')}}" id="email" name="email">
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
                                <input type="text" value="{{old('tempat_lahir')}}" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Kota Tempat Lahir">
                            </div>
                            <div class="col-sm-6">
                                <label for="tgl_lahir">Tgl Lahir</label>
                                <input type="date" value="{{old('tgl_lahir')}}" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir">
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
                                <textarea name="alamat" class="form-control" placeholder="Alamat Rumah">{{old('alamat')}}</textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="rt">RT</label>
                                <input type="number" value="{{old('rt')}}" class="form-control form-control-user" id="rt" name="rt" placeholder="RT">
                            </div>
                            <div class="col-sm-3">
                                <label for="rw">RW</label>
                                <input type="number" value="{{old('rw')}}" class="form-control form-control-user" id="rw" name="rw" placeholder="RW">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 float-left">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control form-control-user" value="{{old('pekerjaan')}}" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                            </div>
                            <div class="col-sm-6">
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" class="form-control form-control-user" value="{{old('kewarganegaraan')}}" id="kewarganegaraan" name="kewarganegaraan" placeholder="WNI">
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
                            <div class="col-sm-6">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" value="{{old('foto')}}" onchange="document.getElementById('foto').value = this.value;" aria-describedby="foto" value="{{old('foto')}}">
                            </div>
                            <!-- <div class="col-sm-3" style="margin-top: 35px;">
                                Belum ada Foto ? <button class="btn btn-info btn-sm">Klik disini</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-2 float-right">
                        <img src="/images/nopict.png" id="imgView" class="card-img-top img-fluid" style="width: 45%; height:45%; display: block; margin: auto; margin-top:25px;">
                    </div>
                    <div class=" col-md-12">
                        <div class="col-md-3 float-left">
                            <a class="btn btn-danger btn-user btn-block text-white" href="{{url('/')}}"> <i class="fa fa-arrow-circle-left"></i> Kembali </a>
                        </div>
                        <div class="col-md-3 float-left">
                            <button class="btn btn-warning btn-user btn-block text-white" type="reset"> <i class="fa fa-undo"></i> Reset </button>
                        </div>
                        <div class="col-md-6 float-right">
                            <button class="btn btn-primary btn-user btn-block" type="submit"> <i class="fa fa-share-square"></i> Kirim </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("#foto").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#foto").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#foto").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }
</script>
@endsection
