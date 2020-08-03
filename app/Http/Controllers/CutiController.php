<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $data = Cuti::latest()->get();
        $pegawai = Pegawai::latest()->get();

        return view('admin.cuti.index', compact('data', 'pegawai'));
    }

    public function delete($id)
    {
        $data = Cuti::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
