<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Instansi;
use App\Jabatan;
use App\Pegawai;
use App\Satuan;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::latest()->get();
        $instansi = Instansi::latest()->get();
        $satuan = Satuan::latest()->get();
        $unit = Unit::latest()->get();
        $golongan = Golongan::latest()->get();
        $jabatan = Jabatan::latest()->get();

        return view('admin.pegawai.index', compact('data', 'instansi', 'satuan', 'unit', 'golongan', 'jabatan'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'unit' => 'required',
            'satuan' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'tgl_masuk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'goldar' => 'required',
            'kependudukan' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'foto' => 'file|mimes:jpeg,png,gif,pdf',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = '2';
        $user->password = Hash::make($request->nip);
        if ($request->foto) {
            $request->file('foto')->move('images/profile/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        } else {
            $user->foto = 'default.png';
        }
        $user->save();

        $data = new Pegawai;
        $data->nip = $request->nip;
        $data->tgl_masuk = $request->tgl_masuk;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->goldar = $request->goldar;
        $data->status = $request->status;
        $data->kependudukan = $request->kependudukan;
        $data->alamat = $request->alamat;
        $data->kodepos = $request->kodepos;
        $data->telp = $request->telp;
        $data->instansi_id = $request->instansi;
        $data->unit_id = $request->unit;
        $data->satuan_id = $request->satuan;
        $data->golongan_id = $request->golongan;
        $data->jabatan_id = $request->jabatan;
        $data->user_id = $user->id;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function show($id)
    {
        $data = Pegawai::where('uuid', $id)->first();

        return view('admin.pegawai.show', compact('data'));
    }

    public function delete($id)
    {
        $data = Pegawai::where('uuid', $id)->first();
        $data->delete();

        $user = User::where('id', $data->user->id)->first();
        $user->delete();

        return back();
    }
}
