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
            'kode' => 'G001',
            'nama' => 'Instansi',
        ]);
    }
}
