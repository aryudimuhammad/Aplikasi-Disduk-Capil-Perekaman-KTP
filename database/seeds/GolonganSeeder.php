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
            'kode' => '001',
            'nama' => 'Pembina Tingkat I (IV/B)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '002',
            'nama' => 'Pembina (IV/A)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '003',
            'nama' => 'Penata Tingkat I (III/D)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '004',
            'nama' => 'Penata (III/C)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '005',
            'nama' => 'Penata Muda (III/A)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '006',
            'nama' => 'Penata Muda Tingkat I (III/B)',
        ]);
        Golongan::insert([
            'uuid' => Str::random(36),
            'kode' => '007',
            'nama' => 'Penata Muda Tingkat I (III/C)',
        ]);
    }
}
