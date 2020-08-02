<?php

namespace App\Http\Controllers;

use App\Ktp;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index');
    }

    public function show()
    {
        $data = Ktp::latest()->get();

        return view('pendaftaran.show', compact('data'));
    }
}
