<?php

use App\Pegawai;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 2; $i <= 4; $i++) {
            Pegawai::insert([
                'uuid' => Str::random(36),
                'nip' => $faker->ean13,
                'user_id' => $i,
                'instansi_id' => '1',
                'unit_id' => $faker->numberBetween(1, 5),
                'satuan_id' => $faker->numberBetween(1, 3),
                'golongan_id' => $faker->numberBetween(1, 7),
                'jabatan_id' => $faker->numberBetween(2, 10),
                'tgl_masuk' => $faker->date,
                'tempat_lahir' => $faker->city,
                'tgl_lahir' => $faker->date,
                'jk' => '1',
                'agama' => $faker->numberBetween(1, 6),
                'goldar' => $faker->numberBetween(1, 4),
                'status' => $faker->numberBetween(1, 2),
                'kependudukan' => 'WNI',
                'alamat' => $faker->address,
                'kodepos' => $faker->numberBetween(100000, 999999),
                'telp' => $faker->phoneNumber,
            ]);
        }

        for ($i = 5; $i <= 8; $i++) {
            Pegawai::insert([
                'uuid' => Str::random(36),
                'nip' => $faker->ean13,
                'user_id' => $i,
                'instansi_id' => '1',
                'unit_id' => $faker->numberBetween(1, 5),
                'satuan_id' => $faker->numberBetween(1, 3),
                'golongan_id' => $faker->numberBetween(1, 7),
                'jabatan_id' => $faker->numberBetween(2, 10),
                'tgl_masuk' => $faker->date,
                'tempat_lahir' => $faker->city,
                'tgl_lahir' => $faker->date,
                'jk' => '2',
                'agama' => $faker->numberBetween(1, 6),
                'goldar' => $faker->numberBetween(1, 4),
                'status' => $faker->numberBetween(1, 2),
                'kependudukan' => 'WNI',
                'alamat' => $faker->address,
                'kodepos' => $faker->numberBetween(100000, 999999),
                'telp' => $faker->phoneNumber,
            ]);
        }
    }
}
