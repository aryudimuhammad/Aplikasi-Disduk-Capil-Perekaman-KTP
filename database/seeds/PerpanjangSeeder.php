<?php

use App\Cuti;
use App\Perpanjang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PerpanjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $mulai = now()->addDays(5);
        $akhir = now()->addDays(10);

        for ($i = 1; $i <= 5; $i++) {
            Perpanjang::insert([
                'uuid' => Str::random(36),
                'cuti_id' => $i,
                'mulai' => $faker->date($mulai),
                'akhir' => $faker->date($akhir),
                'bukti' => 'default.png',
                'keterangan' => $faker->text(200),
                'status' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
