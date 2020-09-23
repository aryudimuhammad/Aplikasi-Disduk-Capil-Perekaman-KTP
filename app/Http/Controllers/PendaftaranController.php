<?php

namespace App\Http\Controllers;

use App\Ktp;
use App\Mail\PendaftaranKTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index');
    }

    public function create(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'permohonan' => 'required',
            'nama' => 'required',
            'kk' => 'required',
            'nik' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kewarganegaraan' => 'required',
            'pekerjaan' => 'required',
            'goldar' => 'required',
            'email' => 'required',
            'foto' => 'file|mimes:jpeg,png,gif,pdf|required',
        ], $messages);

        if ($validator->fails()) {

            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = new Ktp;
        $data->permohonan = $request->permohonan;
        $data->nama = $request->nama;
        $data->kk = $request->kk;
        $data->nik = $request->nik;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->status = $request->status;
        $data->alamat = $request->alamat;
        $data->rt = $request->rt;
        $data->rw = $request->rw;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->pekerjaan = $request->pekerjaan;
        $data->goldar = $request->goldar;
        $data->email = $request->email;
        if ($request->foto) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
        $data->save();
        Mail::to($data->email)->send(new PendaftaranKTP($data));

        return back()->with('success', 'Data Berhasil Terkirim, Silahkan Tunggu Konfirmasi dari Admin');
    }

    public function show()
    {
        $data = Ktp::latest()->get();

        return view('pendaftaran.show', compact('data'));
    }
}
