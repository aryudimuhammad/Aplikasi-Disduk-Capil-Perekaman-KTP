<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function profile()
    {
        if (auth()->user()->role == 2) {
            $pegawai = Pegawai::where('user_id', Auth()->user()->id)->first();
            $data = Cuti::where('pegawai_id', $pegawai->id)->get();
            return view('admin.admin.profile', compact('data'));
        } else {
            return view('admin.admin.profile');
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->update();

        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->jk = $request->jk;
        $pegawai->agama = $request->agama;
        $pegawai->goldar = $request->goldar;
        $pegawai->status = $request->status;
        $pegawai->kependudukan = $request->kependudukan;
        $pegawai->alamat = $request->alamat;
        $pegawai->kodepos = $request->kodepos;
        $pegawai->telp = $request->telp;
        $pegawai->update();

        return back();
    }
}
