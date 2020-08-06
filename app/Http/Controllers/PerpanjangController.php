<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Pegawai;
use App\Perpanjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifikasiPerpanjangCuti;
use Illuminate\Support\Facades\Validator;

class PerpanjangController extends Controller
{
    public function index()
    {
        $auth = Pegawai::where('user_id',  Auth()->user()->id)->first();
        $cuti = Cuti::where('jenis_cuti', 3)->orwhere('jenis_cuti', 4)->get();
        $data = Perpanjang::latest()->get();
        if ($cutifirst = null) {
            $cutifirst = Cuti::where('pegawai_id',  $auth->id)->first();
            $datarole2 = Perpanjang::where('cuti_id', $cutifirst->id)->get();
            return view('admin.perpanjang.index', compact('data', 'cuti', 'datarole2', 'cutifirst'));
        } else {
            return view('admin.perpanjang.index', compact('data', 'cuti', 'cutifirst'));
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'cuti_id' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'bukti' => 'file|required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        if ($request->mulai > $request->akhir) {
            return back()->with('warning', 'Tanggal Cuti Harus Benar!');
        }

        $data = new Perpanjang;
        $data->cuti_id = $request->cuti_id;
        $data->mulai = $request->mulai;
        $data->akhir = $request->akhir;
        $data->keterangan = $request->keterangan;
        if ($request->bukti) {
            $request->file('bukti')->move('bukti/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
        }
        if (auth()->user()->role == 1) {
            $data->status = '2';
            Mail::to($data->cuti->pegawai->user->email)->send(new VerifikasiPerpanjangCuti($data));
        }
        $data->save();

        return back()->with('success', 'Terkirim, Data Berhasil Disimpan.');
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'cuti_id' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        if ($request->mulai > $request->akhir) {
            return back()->with('warning', 'Tanggal Cuti Harus Benar!');
        }

        $data = Perpanjang::find($request->id);
        $data->cuti_id = $request->cuti_id;
        $data->mulai = $request->mulai;
        $data->akhir = $request->akhir;
        $data->keterangan = $request->keterangan;
        if ($request->pict) {
            $request->file('pict')->move('bukti/', $request->file('pict')->getClientOriginalName());
            $data->bukti = $request->file('pict')->getClientOriginalName();
        } else {
            $data->bukti = $data->bukti;
        }
        $data->update();


        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function status(Request $request)
    {
        $data = Perpanjang::where('uuid', $request->id)->first();
        $data->status = $request->status;
        $data->update();
        Mail::to($data->cuti->pegawai->user->email)->send(new VerifikasiPerpanjangCuti($data));

        return back()->with('success', 'Terkirim, Status Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Perpanjang::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
