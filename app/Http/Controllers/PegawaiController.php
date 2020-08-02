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

    public function delete($id)
    {
        $data = Pegawai::where('uuid', $id)->first();
        $data->delete();

        $user = User::where('id', $data->user->id)->first();
        $user->delete();

        return back();
    }
}
