<?php

use App\Instansi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instansi::insert([
            'uuid' => Str::random(36),
            'kode' => '001',
            'nama' => 'DINAS PENCATATAN SIPIL DAN KELUARGA BERENCANA',
        ]);
    }
}
