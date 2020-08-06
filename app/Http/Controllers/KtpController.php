<?php

namespace App\Http\Controllers;

use App\Ktp;
use App\Mail\PendaftaranKTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class KtpController extends Controller
{
    public function index()
    {
        $data = Ktp::latest()->get();

        return view('admin.ktp.index', compact('data'));
    }

    public function show($id)
    {
        $data = Ktp::where('uuid', $id)->first();

        return view('admin.ktp.show', compact('data'));
    }

    public function store(Request $request)
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
        $data->status = '2';
        if ($request->foto) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
        }
        $data->save();
        Mail::to($data->email)->send(new PendaftaranKTP($data));

        return back()->with('success', 'Terkirim, Data Berhasil Disimpan.');
    }

    public function update(Request $request)
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
            'pict' => 'file|mimes:jpeg,png,gif,pdf',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = Ktp::where('uuid', $request->id)->first();
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
        if ($request->pict) {
            $request->file('pict')->move('foto/', $request->file('pict')->getClientOriginalName());
            $data->foto = $request->file('pict')->getClientOriginalName();
        } else {
            $data->foto = $data->foto;
        }
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function status(Request $request)
    {
        $data = Ktp::where('uuid', $request->id)->first();
        $data->status_ktp = $request->status;
        $data->keterangan = $request->keterangan;
        $data->update();
        Mail::to($data->email)->send(new PendaftaranKTP($data));

        return back()->with('success', 'Terkirim, Status Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Ktp::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
