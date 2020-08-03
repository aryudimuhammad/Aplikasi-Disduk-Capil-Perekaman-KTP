<?php

use App\Cuti;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $mulai = now();
        $akhir = now()->addDays(5);

        for ($i = 1; $i <= 5; $i++) {
            Cuti::insert([
                'uuid' => Str::random(36),
                'pegawai_id' => $i,
                'jenis_cuti' => $faker->numberBetween(3, 4),
                'mulai_cuti' => $faker->date($mulai),
                'akhir_cuti' => $faker->date($akhir),
                'keterangan' => $faker->text(200),
                'status' => $faker->numberBetween(1, 2),
            ]);
        }
        for ($i = 6; $i <= 10; $i++) {
            Cuti::insert([
                'uuid' => Str::random(36),
                'pegawai_id' => $i,
                'jenis_cuti' => $faker->numberBetween(1, 5),
                'mulai_cuti' => $faker->date($mulai),
                'akhir_cuti' => $faker->date($akhir),
                'keterangan' => $faker->text(200),
                'status' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
