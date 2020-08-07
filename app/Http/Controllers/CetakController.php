<?php

namespace App\Http\Controllers;

use App\Cuti;
use App\Golongan;
use App\Instansi;
use App\Jabatan;
use App\Ktp;
use App\Pegawai;
use App\Pensiun;
use App\Satuan;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class CetakController extends Controller
{
    public function pegawai()
    {
        $data = Pegawai::latest()->get();

        $pdf = PDF::loadview('laporan/pegawai', compact('data'));
        return $pdf->stream('laporan-pegawai-pdf');
    }

    public function pegawaitgl(Request $request)
    {
        $data = Pegawai::whereBetween('tgl_masuk', [$request->start, $request->end])->get();

        $pdf = PDF::loadview('laporan/pegawai', compact('data'));
        return $pdf->stream('laporan-pegawai-pdf');
    }

    public function ktp()
    {
        $data = Ktp::latest()->get();

        $pdf = PDF::loadview('laporan/ktp', compact('data'));
        return $pdf->stream('laporan-ktp-pdf');
    }

    public function ktptgl(Request $request)
    {
        $data = Ktp::whereBetween('created_at', [$request->start, $request->end])->get();

        $pdf = PDF::loadview('laporan/ktp', compact('data'));
        return $pdf->stream('laporan-ktp-pdf');
    }

    public function pensiun()
    {
        $data = Pensiun::latest()->get();

        $pdf = PDF::loadview('laporan/pensiun', compact('data'));
        return $pdf->stream('laporan-pensiun-pdf');
    }

    public function pensiuntgl(Request $request)
    {
        $data = Pensiun::whereBetween('created_at', [$request->start, $request->end])->get();

        $pdf = PDF::loadview('laporan/pensiun', compact('data'));
        return $pdf->stream('laporan-pensiun-pdf');
    }

    public function cuti()
    {
        $data = Cuti::latest()->get();

        $pdf = PDF::loadview('laporan/cuti', compact('data'));
        return $pdf->stream('laporan-cuti-pdf');
    }

    public function cutitgl(Request $request)
    {
        $data = Cuti::whereBetween('mulai_cuti', [$request->start, $request->end])->get();

        $pdf = PDF::loadview('laporan/cuti', compact('data'));
        return $pdf->stream('laporan-cuti-pdf');
    }

    public function perpanjang()
    {
        $data = Cuti::whereNotNull('perpanjang_id')->orderby('perpanjang_id', 'desc')->get();

        $pdf = PDF::loadview('laporan/perpanjang', compact('data'));
        return $pdf->stream('laporan-cuti-pdf');
    }

    public function perpanjangtgl(Request $request)
    {
        $data = Cuti::whereNotNull('perpanjang_id')->whereBetween('mulai', [$request->start, $request->end])->get();

        $pdf = PDF::loadview('laporan/perpanjang', compact('data'));
        return $pdf->stream('laporan-cuti-pdf');
    }

    public function instansi()
    {
        $data = Instansi::latest()->get();

        $pdf = PDF::loadview('laporan/instansi', compact('data'));
        return $pdf->stream('laporan-instansi-pdf');
    }

    public function unit()
    {
        $data = Unit::latest()->get();

        $pdf = PDF::loadview('laporan/unit', compact('data'));
        return $pdf->stream('laporan-unit-pdf');
    }

    public function satuan()
    {
        $data = Satuan::latest()->get();

        $pdf = PDF::loadview('laporan/satuan', compact('data'));
        return $pdf->stream('laporan-satuan-pdf');
    }

    public function golongan()
    {
        $data = Golongan::latest()->get();

        $pdf = PDF::loadview('laporan/golongan', compact('data'));
        return $pdf->stream('laporan-golongan-pdf');
    }

    public function jabatan()
    {
        $data = Jabatan::latest()->get();

        $pdf = PDF::loadview('laporan/jabatan', compact('data'));
        return $pdf->stream('laporan-jabatan-pdf');
    }
}
