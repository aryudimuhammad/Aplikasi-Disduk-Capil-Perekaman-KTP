<?php

namespace App\Http\Controllers;

use App\Ktp;
use Illuminate\Http\Request;

class KtpController extends Controller
{
    public function index()
    {
        $data = Ktp::latest()->get();

        return view('admin.ktp.index', compact('data'));
    }

    public function delete($id)
    {
        $data = Ktp::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
