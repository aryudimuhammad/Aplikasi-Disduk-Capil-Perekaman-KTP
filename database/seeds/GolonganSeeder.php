<?php

use App\Golongan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => 'G001',
            'nama' => 'Golongan',
        ]);
    }
}
