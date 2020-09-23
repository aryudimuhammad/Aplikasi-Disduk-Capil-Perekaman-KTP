<?php

use App\Ktp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class KtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 25; $i++) {

            Ktp::insert([
                'uuid' => Str::random(36),
                'permohonan' => $faker->numberBetween(1, 3),
                'nama' => $faker->firstNameMale,
                'kk' => $faker->ean13,
                'nik' => $faker->ean13,
                'jk' => '1',
                'agama' => $faker->numberBetween(1, 6),
                'tempat_lahir' => $faker->address,
                'tgl_lahir' => $faker->date,
                'status' => $faker->numberBetween(1, 2),
                'alamat' => $faker->address,
                'rt' => $faker->numberBetween(001, 032),
                'rw' => $faker->numberBetween(001, 021),
                'kewarganegaraan' => 'WNI',
                'goldar' => $faker->numberBetween(1, 2, 3, 4),
                'pekerjaan' => 'Swasta',
                'foto' => 'default.png',
                'email' => $faker->email,
                'created_at' => $faker->dateTimeBetween('now'),
            ]);
        }


        for ($i = 1; $i <= 25; $i++) {

            Ktp::insert([
                'uuid' => Str::random(36),
                'permohonan' => $faker->numberBetween(1, 3),
                'nama' => $faker->firstNameFemale,
                'kk' => $faker->ean13,
                'nik' => $faker->ean13,
                'jk' => '2',
                'tgl_lahir' => $faker->date,
                'agama' => $faker->numberBetween(1, 6),
                'tempat_lahir' => $faker->address,
                'status' => $faker->numberBetween(1, 2),
                'alamat' => $faker->address,
                'rt' => $faker->numberBetween(001, 032),
                'rw' => $faker->numberBetween(001, 021),
                'kewarganegaraan' => 'WNI',
                'goldar' => $faker->numberBetween(1, 2, 3, 4),
                'pekerjaan' => 'Swasta',
                'foto' => 'default.png',
                'email' => $faker->email,
                'created_at' => $faker->dateTimeBetween('now'),
            ]);
        }
    }
}
