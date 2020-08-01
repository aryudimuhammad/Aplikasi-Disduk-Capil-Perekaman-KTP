<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('users')->insert([
            'uuid' => Str::random(36),
            'name' => 'Joni',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        // $this->call(UserSeeder::class);
    }
}
