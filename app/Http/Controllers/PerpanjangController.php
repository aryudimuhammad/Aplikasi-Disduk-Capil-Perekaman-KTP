<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Perpanjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifikasiPerpanjangCuti;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PerpanjangController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1) {
            $now = Carbon::now()->format('Y-m-d');
            $data = Cuti::where('jenis_cuti', '>', 2)->where('jenis_cuti', '<', 5)->where('akhir_cuti', '>=', $now)->where('status', 2)->get();

            return view('admin.perpanjang.index', compact('data'));
        } else {
            $now = Carbon::now()->format('Y-m-d');
            $data = Cuti::where('pegawai_id', Auth()->user()->pegawai->id)->where('jenis_cuti', '>', 2)->where('jenis_cuti', '<', 5)->where('akhir_cuti', '>=', $now)->where('status', 2)->get();

            return view('admin.perpanjang.index', compact('data'));
        }
    }

    public function show($id)
    {
        $cuti = Cuti::where('uuid', $id)->first();
        $perpanjang = Perpanjang::where('id', $cuti->perpanjang_id)->first();
        $data = Cuti::where('uuid', $id)->orderby('perpanjang_id', 'desc')->get();

        return view('admin.perpanjang.show', compact('data', 'cuti', 'perpanjang'));
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

        $mulai = Carbon::parse($request->mulai)->addDays(1)->format('Y-m-d');
        $data = new Perpanjang;
        $data->mulai = $mulai;
        $data->akhir = $request->akhir;
        $data->keterangan = $request->keterangan;
        if ($request->bukti) {
            $request->file('bukti')->move('bukti/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
        }
        if (auth()->user()->role == 1) {
            $data->status = '2';
        }
        $data->save();

        $cuti = Cuti::find($request->cuti_id);
        $cuti->perpanjang_id = $data->id;
        $cuti->update();
        if (auth()->user()->role == 1) {
            Mail::to($cuti->pegawai->user->email)->send(new VerifikasiPerpanjangCuti($data));
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

    public function delete($id, $uuid)
    {
        $data = Perpanjang::where('uuid', $uuid)->first();
        $data->delete();

        $cuti = Cuti::where('uuid', $id)->first();
        $cuti->perpanjang_id = Null;
        $cuti->update();

        return back();
    }
}
