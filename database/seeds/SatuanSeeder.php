<?php

use App\Satuan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::insert([
            'uuid' => Str::random(36),
            'kode' => '001',
            'nama' => 'APARATUR PENCATATAN SIPIL',
        ]);
        Satuan::insert([
            'uuid' => Str::random(36),
            'kode' => '002',
            'nama' => 'ADMINISTRASI KEPENDUDUKAN',
        ]);
        Satuan::insert([
            'uuid' => Str::random(36),
            'kode' => '003',
            'nama' => 'PENCATATAN SIPIL',
        ]);
    }
}
