<?php

namespace App\Http\Controllers;

use App\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        $data = Instansi::latest()->get();

        return view('admin.instansi.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Instansi::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
