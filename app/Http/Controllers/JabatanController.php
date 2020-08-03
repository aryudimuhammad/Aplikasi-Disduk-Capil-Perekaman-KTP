<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::latest()->get();

        return view('admin.jabatan.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Jabatan::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
