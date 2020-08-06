<?php

namespace App\Http\Controllers;

use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    public function index()
    {
        $data = Instansi::latest()->get();

        return view('admin.instansi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = new Instansi;
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->save();

        return back()->with('success', 'Data Berhasil Disimpan.');
    }

    public function update(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->with('warning', $validator->errors()->all()[0])->withInput();
        }

        $data = Instansi::find($request->id);
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->update();

        return back()->with('success', 'Data Berhasil Diubah.');
    }

    public function delete($id)
    {
        $data = Instansi::where('uuid', $id)->first();
        $data->delete();

        return back();
    }
}
