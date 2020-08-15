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
            'kode' => '001',
            'nama' => 'Kepala Dinas',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '002',
            'nama' => 'Wakil Kepala Dinas',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '003',
            'nama' => 'Kepala Seksi',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '004',
            'nama' => 'Kepala Sub Bagian',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '005',
            'nama' => 'Kepala Bagian',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '006',
            'nama' => 'Kepala Bagian Sub Keuangan',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '007',
            'nama' => 'Kepala Sub Bagian Administrasi',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '008',
            'nama' => 'Kepala Sub Bagian Fasilitasi',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '009',
            'nama' => 'Kepala Sub Bagian Informasi',
        ]);
        Jabatan::insert([
            'uuid' => Str::random(36),
            'kode' => '010',
            'nama' => 'Kepala Sub Bagian Advokasi',
        ]);
    }
}
