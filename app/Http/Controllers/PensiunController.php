<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pensiun;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    public function index()
    {
        $data = Pensiun::latest()->get();
        $pegawai = Pegawai::latest()->get();

        return view('admin.pensiun.index', compact('data', 'pegawai'));
    }

    public function delete($id)
    {
        $data = Pensiun::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
