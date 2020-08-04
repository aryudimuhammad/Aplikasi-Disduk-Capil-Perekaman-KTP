<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
        $data = Cuti::latest()->get();
        $datarole2 = Cuti::where('pegawai_id', $auth->id)->get();
        $pegawai = Pegawai::latest()->get();

        return view('admin.cuti.index', compact('data', 'pegawai', 'datarole2'));
    }

    public function delete($id)
    {
        $data = Cuti::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
