<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Contacts::insert([
            ['name' => 'Abraham Maleko', 'email' => 'abrahammaleko@gmail.com','address'=> 'Mbezi Beach', 'profile_url' => 'contact_profiles/U7fzROFFsjF21yUj1wXUxlUcXyUksYDyilmGbAo1.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Benedict pascal', 'email' => 'bennetpascal@gmail.com','address'=> 'Mbezi Beach', 'profile_url' => null, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Violeth hussein', 'email' => 'violeth@gmail.com','address'=> 'Masaki,Dar es Salaam', 'profile_url' => 'contact_profiles/EZeBNcw53zfcRQCr3azN0MZKAZcxhBtku2iH0KUh.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'John Doe', 'email' => 'apotekhealth@gmail.com','address'=> 'Kinondoni', 'profile_url' => 'contact_profiles/JtqOyMmMdsqKVAhS10AY1fZFBO4ZzEX3ifCG4Ojc.jpg', 'created_at' => $now, 'updated_at' => $now],

        ]);


    }
}
