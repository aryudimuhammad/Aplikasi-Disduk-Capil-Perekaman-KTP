<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            return view('admin.user.profile', compact('data'));
        } else {
            return view('admin.user.profile');
        }
    }

    public function update(Request $request)
    {
        if (Auth::user()->role == 2) {
            $messages = [
                'required' => ':attribute harus diisi.',
            ];
            $validator = Validator::make($request->all(), [
                'nip' => 'required',
                'nama' => 'required',
                'instansi' => 'required',
                'unit' => 'required',
                'satuan' => 'required',
                'golongan' => 'required',
                'jabatan' => 'required',
                'tgl_masuk' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'goldar' => 'required',
                'kependudukan' => 'required',
                'status' => 'required',
                'alamat' => 'required',
                'kodepos' => 'required',
                'telp' => 'required',
                'email' => 'required',
                'foto' => 'file|mimes:jpeg,png,gif,pdf',
            ], $messages);

            if ($validator->fails()) {
                return back()->with('warning', $validator->errors()->all()[0])->withInput();
            }
        } else {
            $messages = [
                'required' => ':attribute harus diisi.',
            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'nama' => 'required',
                'foto' => 'file|mimes:jpeg,png,gif',
            ], $messages);

            if ($validator->fails()) {
                return back()->with('warning', $validator->errors()->all()[0])->withInput();
            }
        }

        $user = User::find(Auth()->user()->id);
        $user->name = $request->nama;
        $user->email = $request->email;
        if ($request->foto) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
        } else {
            $user->foto = $user->foto;
        }
        $user->update();

        if ($request->password_lama && $request->password_baru) {
            $messages = [
                'required' => ':attribute harus di isi.',
                'min' => ':attribute minimal harus 3 karakter.',
                'same' => 'Konfirmasi Password Salah.',
            ];
            $validator = Validator::make($request->all(), [
                'password_lama' => ['required'],
                'konfirmasi_password' => ['required'],
                'password_baru' => ['same:konfirmasi_password', 'min:3'],
            ], $messages);

            if ($validator->fails()) {
                return back()->with('warning', $validator->errors()->all()[0])->withInput();
            }

            if (Hash::check($request->password_lama, $user->password)) {
                $user->password = Hash::make($request->password_baru);
            } else {
                return back()->with('warning', 'Password yang Anda Masukkan Salah');
            }
        } elseif (!$request->password_lama && !$request->password_baru && !$request->konfirmasi_password) {
            $user->password = Hash::make($user->password);
        } else {
            return back()->with('warning', 'Password Harus Diisi.');
        }
        $user->update();

        if (Auth::user()->role == 2) {
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
        }

        return back()->with('success', 'Data Berhasil Diupdate.');
    }
}
