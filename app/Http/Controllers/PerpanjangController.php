<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Perpanjang;
use Illuminate\Http\Request;

class PerpanjangController extends Controller
{
    public function index()
    {
        $data = Perpanjang::latest()->get();
        $cuti = Cuti::where('jenis_cuti', 3)->orwhere('jenis_cuti', 4)->get();

        return view('admin.perpanjang.index', compact('data', 'cuti'));
    }

    public function delete($id)
    {
        $data = Perpanjang::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
