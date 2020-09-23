<?php

use App\Cuti;
use App\Golongan;
use App\Instansi;
use App\Jabatan;
use App\Ktp;
use App\Pegawai;
use App\Pensiun;
use App\Perpanjang;
use App\Satuan;
use App\Unit;
use Carbon\Carbon;

// function totaljanuaribaru()
// {
//     $from = Carbon::parse('2020-01-01');
//     $to = date('2020-01-31');
//     return Ktp::where('permohonan', 1)->whereBetween('created_at', [$from, $to])->count();
// }

// function totaljanuariperpanjang()
// {
//     $from = date('{{carbon\carbon::now()->format("Y")}}-01-01');
//     $to = date('{{carbon\carbon::now()->format("Y")}}-01-31');
//     return Ktp::where('permohonan', 2)->whereBetween('created_at', [$from, $to])->count();
// }

// function totaljanuaripergantian()
// {
//     $from = date('{{carbon\carbon::now()->format("Y")}}-01-01');
//     $to = date('{{carbon\carbon::now()->format("Y")}}-01-31');
//     return Ktp::where('permohonan', 3)->whereBetween('created_at', [$from, $to])->count();
// }

function totalpegawai()
{
    return Pegawai::count();
}

function totalktp()
{
    return Ktp::count();
}

function totalktpnotif()
{
    return Ktp::where('status_ktp', 1)->count();
}

function totalpensiun()
{
    return Pensiun::count();
}

function totalpensiunnotif()
{
    return Pensiun::where('status', 1)->count();
}

function totalcuti()
{
    return Cuti::count();
}

function totalcutinotif()
{
    return Cuti::where('status', 1)->count();
}

function totalperpanjang()
{
    return Perpanjang::count();
}

function totalperpanjangnotif()
{
    return Perpanjang::where('status', 1)->count();
}

function totalinstansi()
{
    return Instansi::count();
}

function totalunit()
{
    return Unit::count();
}

function totalsatuan()
{
    return Satuan::count();
}

function totalgolongan()
{
    return Golongan::count();
}

function totaljabatan()
{
    return Jabatan::count();
}
