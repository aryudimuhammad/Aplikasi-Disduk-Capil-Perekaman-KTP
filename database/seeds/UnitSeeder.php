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
            'kode' => 'G001',
            'nama' => 'Unit Kerja',
        ]);
    }
}
