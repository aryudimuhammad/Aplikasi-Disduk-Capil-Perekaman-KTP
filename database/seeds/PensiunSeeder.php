<?php

use App\Pensiun;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PensiunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            Pensiun::insert([
                'uuid' => Str::random(36),
                'pegawai_id' => $i,
                'jenis_pensiun' => $faker->numberBetween(1, 6),
                'status_berkas' => $faker->numberBetween(1, 7),
                'keterangan' => $faker->text(50),
                'status' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
