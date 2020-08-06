<?php

namespace App\Http\Controllers;

use App\Mail\VerifikasiPensiun;
use App\Pegawai;
use App\Pensiun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PensiunController extends Controller
{
    public function index()
    {
        if (Auth()->user()->role == 2) {
            $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
            $data = Pensiun::latest()->get();
            $datarole2 = Pensiun::where('pegawai_id', $auth->id)->get();
            $pegawai = Pegawai::latest()->get();
            return view('admin.pensiun.index', compact('data', 'pegawai', 'datarole2'));
        } else {
            $data = Pensiun::latest()->get();
            $pegawai = Pegawai::latest()->get();
            return view('admin.pensiun.index', compact('data', 'pegawai'));
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required',
            'jenis_pensiun' => 'required',
            'status_berkas' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = new Pensiun;
        $data->pegawai_id = $request->pegawai_id;
        $data->jenis_pensiun = $request->jenis_pensiun;
        $data->status_berkas = $request->status_berkas;
        $data->keterangan = $request->keterangan;
        if (Auth::user()->role == 1) {
            $data->status = '2';
        }
        $data->save();
        if (Auth::user()->role == 1) {
            Mail::to($data->pegawai->user->email)->send(new VerifikasiPensiun($data));
        }

        return back()->with('success', 'Terkirim, Data Berhasil Disimpan.');
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required',
            'jenis_pensiun' => 'required',
            'status_berkas' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = Pensiun::find($request->id);
        $data->pegawai_id = $request->pegawai_id;
        $data->jenis_pensiun = $request->jenis_pensiun;
        $data->status_berkas = $request->status_berkas;
        $data->keterangan = $request->keterangan;
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function status(Request $request)
    {
        $data = Pensiun::where('uuid', $request->id)->first();
        $data->status = $request->status;
        $data->update();
        Mail::to($data->pegawai->user->email)->send(new VerifikasiPensiun($data));

        return back()->with('success', 'Terkirim, Status Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Pensiun::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
