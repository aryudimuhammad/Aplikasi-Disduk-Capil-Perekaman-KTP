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

function totalpegawai()
{
    return Pegawai::count();
}

function totalktp()
{
    return Ktp::count();
}

function totalpensiun()
{
    return Pensiun::count();
}

function totalcuti()
{
    return Cuti::count();
}

function totalperpanjang()
{
    return Perpanjang::count();
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
