<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Pensiun;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    public function index()
    {
        if (Auth()->user()->role == 2) {
            $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
            $data = Pensiun::latest()->get();
            $datarole2 = Pensiun::where('pegawai_id', $auth->id)->get();
            $pegawai = Pegawai::latest()->get();
            return view('admin.pensiun.index', compact('data', 'pegawai', 'datarole2'));
        } else {
            $data = Pensiun::latest()->get();
            $pegawai = Pegawai::latest()->get();
            return view('admin.pensiun.index', compact('data', 'pegawai'));
        }
    }

    public function delete($id)
    {
        $data = Pensiun::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
