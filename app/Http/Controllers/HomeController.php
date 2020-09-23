<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Ktp;
use App\Pegawai;
use App\User;
use Carbon\Carbon;
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

    public function dashboard()
    {
        $now = Carbon::now()->format('Y');
        $jumlah = Ktp::whereYear('created_at', $now)->count();

        $januari1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '01')->whereYear('created_at', $now)->count();
        $januari2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '01')->whereYear('created_at', $now)->count();
        $januari3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '01')->whereYear('created_at', $now)->count();

        $februari1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '02')->whereYear('created_at', $now)->count();
        $februari2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '02')->whereYear('created_at', $now)->count();
        $februari3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '02')->whereYear('created_at', $now)->count();

        $maret1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '03')->whereYear('created_at', $now)->count();
        $maret2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '03')->whereYear('created_at', $now)->count();
        $maret3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '03')->whereYear('created_at', $now)->count();

        $april1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '04')->whereYear('created_at', $now)->count();
        $april2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '04')->whereYear('created_at', $now)->count();
        $april3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '04')->whereYear('created_at', $now)->count();

        $mei1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '05')->whereYear('created_at', $now)->count();
        $mei2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '05')->whereYear('created_at', $now)->count();
        $mei3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '05')->whereYear('created_at', $now)->count();

        $juni1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '06')->whereYear('created_at', $now)->count();
        $juni2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '06')->whereYear('created_at', $now)->count();
        $juni3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '06')->whereYear('created_at', $now)->count();

        $juli1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '07')->whereYear('created_at', $now)->count();
        $juli2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '07')->whereYear('created_at', $now)->count();
        $juli3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '07')->whereYear('created_at', $now)->count();

        $agustus1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '08')->whereYear('created_at', $now)->count();
        $agustus2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '08')->whereYear('created_at', $now)->count();
        $agustus3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '08')->whereYear('created_at', $now)->count();

        $oktober1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '09')->whereYear('created_at', $now)->count();
        $oktober2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '09')->whereYear('created_at', $now)->count();
        $oktober3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '09')->whereYear('created_at', $now)->count();

        $september1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '10')->whereYear('created_at', $now)->count();
        $september2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '10')->whereYear('created_at', $now)->count();
        $september3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '10')->whereYear('created_at', $now)->count();

        $november1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '11')->whereYear('created_at', $now)->count();
        $november2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '11')->whereYear('created_at', $now)->count();
        $november3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '11')->whereYear('created_at', $now)->count();

        $desember1 = Ktp::where('permohonan', 1)->whereMonth('created_at', '12')->whereYear('created_at', $now)->count();
        $desember2 = Ktp::where('permohonan', 2)->whereMonth('created_at', '12')->whereYear('created_at', $now)->count();
        $desember3 = Ktp::where('permohonan', 3)->whereMonth('created_at', '12')->whereYear('created_at', $now)->count();

        return view('admin.dashboard.index', compact('jumlah', 'januari1', 'januari2', 'januari3', 'februari1', 'februari2', 'februari3', 'april1', 'april2', 'april3', 'maret1', 'maret2', 'maret3', 'mei1', 'mei2', 'mei3', 'juni1', 'juni2', 'juni3', 'juli1', 'juli2', 'juli3', 'agustus1', 'agustus2', 'agustus3', 'oktober1', 'oktober2', 'oktober3', 'november1', 'november2', 'november3', 'september1', 'september2', 'september3', 'desember1', 'desember2', 'desember3'));
    }

    public function update(Request $request)
    {
        if (Auth::user()->role == 2) {
            $messages = [
                'required' => ':attribute harus diisi.',
            ];
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
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
        if ($request->password_baru) {
            $messages = [
                'required' => 'Konfirmasi Password Harus Diisi.',
                'min' => 'Passowrd Minimal Harus 3 Karakter.',
                'same' => 'Konfirmasi Password Salah.',
            ];
            $validator = Validator::make($request->all(), [
                'konfirmasi_password' => 'required',
                'password_baru' => 'same:konfirmasi_password|min:3',
            ], $messages);

            if ($validator->fails()) {
                return back()->with('warning', $validator->errors()->all()[0])->withInput();
            }

            $user->password = Hash::make($request->password_baru);
        } else {
            $user->password = $user->password;
        }
        if ($request->foto) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $user->foto = $request->file('foto')->getClientOriginalName();
        } else {
            $user->foto = $user->foto;
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
