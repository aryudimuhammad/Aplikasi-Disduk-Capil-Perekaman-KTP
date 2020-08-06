<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Mail\VerifikasiCuti;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    public function index()
    {
        if (Auth()->user()->role == 2) {
            $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
            $data = Cuti::latest()->get();
            $datarole2 = Cuti::where('pegawai_id', $auth->id)->get();
            $pegawai = Pegawai::latest()->get();
            return view('admin.cuti.index', compact('data', 'pegawai', 'datarole2'));
        } else {
            $pegawai = Pegawai::latest()->get();
            $data = Cuti::latest()->get();
            return view('admin.cuti.index', compact('data', 'pegawai'));
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required',
            'jenis_cuti' => 'required',
            'mulai_cuti' => 'required',
            'akhir_cuti' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        if ($request->mulai_cuti > $request->akhir_cuti) {
            return back()->with('warning', 'Tanggal Cuti Harus Benar!');
        }

        $data = new Cuti;
        $data->pegawai_id = $request->pegawai_id;
        $data->jenis_cuti = $request->jenis_cuti;
        $data->mulai_cuti = $request->mulai_cuti;
        $data->akhir_cuti = $request->akhir_cuti;
        $data->keterangan = $request->keterangan;
        if (auth()->user()->role == 1) {
            $data->status = '2';
            Mail::to($data->pegawai->user->email)->send(new VerifikasiCuti($data));
        }
        $data->save();

        if (auth()->user()->role == 1) {
            return back()->with('success', 'Terkirim, Data Berhasil Disimpan.');
        } else {
            return back()->with('success', 'Data Berhasil Disimpan.');
        }
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required',
            'jenis_cuti' => 'required',
            'mulai_cuti' => 'required',
            'akhir_cuti' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        if ($request->mulai_cuti > $request->akhir_cuti) {
            return back()->with('warning', 'Tanggal Cuti Harus Benar!');
        }

        $data = Cuti::find($request->id);
        $data->pegawai_id = $request->pegawai_id;
        $data->jenis_cuti = $request->jenis_cuti;
        $data->mulai_cuti = $request->mulai_cuti;
        $data->akhir_cuti = $request->akhir_cuti;
        $data->keterangan = $request->keterangan;
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function status(Request $request)
    {
        $data = Cuti::where('uuid', $request->id)->first();
        $data->status = $request->status;
        $data->update();
        Mail::to($data->pegawai->user->email)->send(new VerifikasiCuti($data));

        return back()->with('success', 'Terkirim, Status Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Cuti::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
