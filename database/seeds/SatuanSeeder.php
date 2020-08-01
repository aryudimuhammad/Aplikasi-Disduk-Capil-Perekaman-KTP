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
            'kode' => 'G001',
            'nama' => 'Satuan Kerja',
        ]);
    }
}
