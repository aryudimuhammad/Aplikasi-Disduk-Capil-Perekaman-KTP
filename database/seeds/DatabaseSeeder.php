<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        User::insert([
            'uuid' => Str::random(36),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        for ($i = 2; $i <= 4; $i++) {
            User::insert([
                'uuid' => Str::random(36),
                'name' => $faker->firstNameMale + '' + $faker->lastName,
                'email' => $faker->firstNameMale + '@gmail.com',
                'password' => Hash::make('123'),
                'role' => '2'
            ]);
        }

        for ($i = 5; $i <= 11; $i++) {
            User::insert([
                'uuid' => Str::random(36),
                'name' => $faker->firstNameFemale  + '' + $faker->lastName,
                'email' => $faker->firstNameFemale + '@gmail.com',
                'password' => Hash::make('123'),
                'role' => '2'
            ]);
        }

        $this->call(InstansiSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(SatuanSeeder::class);
        $this->call(GolonganSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(CutiSeeder::class);
        $this->call(PensiunSeeder::class);
        $this->call(KtpSeeder::class);
        $this->call(PerpanjangSeeder::class);
    }
}
