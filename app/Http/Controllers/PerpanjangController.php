<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use App\Perpanjang;
use Illuminate\Http\Request;

class PerpanjangController extends Controller
{
    public function index()
    {
        $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
        $data = Perpanjang::latest()->get();
        if ($cutifirst = null) {
            $cutifirst = Cuti::where('pegawai_id',  $auth->id)->first();
            $cuti = Cuti::where('jenis_cuti', 3)->orwhere('jenis_cuti', 4)->get();
            $datarole2 = Perpanjang::where('cuti_id', $cutifirst->id)->get();
            return view('admin.perpanjang.index', compact('data', 'cuti', 'datarole2', 'cutifirst'));
        }
        return view('admin.perpanjang.index', compact('data', 'cutifirst'));
    }

    public function delete($id)
    {
        $data = Perpanjang::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
