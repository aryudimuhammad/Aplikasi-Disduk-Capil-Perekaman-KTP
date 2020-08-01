<?php

use App\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => 'G001',
            'nama' => 'Jabatan',
        ]);
    }
}
