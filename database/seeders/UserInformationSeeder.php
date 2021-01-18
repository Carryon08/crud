<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('information')->insert([
            'address' => 'Arteaga #12 Irrigacion, Ags',
            'count' => 123456780987543245,
            'bank' => 'Bancomer',
            'salary' => 10000,
            'phone' => 4651236543,
            'user_id' => 1,
        ]);
        DB::table('information')->insert([
            'address' => 'Escutia #405 Plutarco, Ags',
            'count' => 341256871209348776,
            'bank' => 'Bancomer',
            'salary' => 400000,
            'phone' => 4656768768,
            'user_id' => 2,
        ]);
    }
}
