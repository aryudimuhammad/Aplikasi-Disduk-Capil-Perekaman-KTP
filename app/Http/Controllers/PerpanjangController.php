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
        $cutipegawai = Cuti::where('pegawai_id', $auth->id)->where('jenis_cuti', '>', 2)->where('jenis_cuti', '<', 5)->first();
        $data = Perpanjang::latest()->get();

        if (auth()->user()->role == 2) {
            $cuti = Cuti::where('pegawai_id', $auth->id)->where('jenis_cuti', '>', 2)->where('jenis_cuti', '<', 5)->get();
            $datarole2 = Cuti::where('pegawai_id',  $auth->id)->where('perpanjang_id', !null)->get();
            return view('admin.perpanjang.index', compact('data', 'cuti', 'datarole2', 'cutipegawai'));
        } else {
            $cuti = Cuti::where('jenis_cuti', '>', 2)->where('jenis_cuti', '<', 5)->get();
            return view('admin.perpanjang.index', compact('data', 'cuti'));
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
