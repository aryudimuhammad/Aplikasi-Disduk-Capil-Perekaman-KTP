<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $data = Satuan::latest()->get();

        return view('admin.satuan.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Satuan::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
