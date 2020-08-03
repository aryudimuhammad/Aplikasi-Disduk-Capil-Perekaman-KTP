<?php

namespace App\Http\Controllers;

use App\Golongan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class GolonganController extends Controller
{
    public function index()
    {
        $data = Golongan::latest()->get();

        return view('admin.golongan.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Golongan::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
