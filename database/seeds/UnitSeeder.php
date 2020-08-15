<?php

use App\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Unit::insert([
            'uuid' => Str::random(36),
            'kode' => '001',
            'nama' => 'KEPENDUDUKAN',
        ]);

        Unit::insert([
            'uuid' => Str::random(36),
            'kode' => '002',
            'nama' => 'BIDANG FASILITASI',
        ]);

        Unit::insert([
            'uuid' => Str::random(36),
            'kode' => '003',
            'nama' => 'BIDANG INFORMASI',
        ]);

        Unit::insert([
            'uuid' => Str::random(36),
            'kode' => '004',
            'nama' => 'BIDANG SARANA DAN PRASARANA',
        ]);

        Unit::insert([
            'uuid' => Str::random(36),
            'kode' => '005',
            'nama' => 'KOMUNIKASI INFORMASI DAN EDUKASI',
        ]);
    }
}
