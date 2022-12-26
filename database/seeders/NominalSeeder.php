<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NominalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('nominals')->insert([
            'harga' => 5000,
        ]);

        DB::table('nominals')->insert([
            'harga' => 10000,
        ]);

        DB::table('nominals')->insert([
            'harga' => 20000,
        ]);

        DB::table('nominals')->insert([
            'harga' => 50000,
        ]);

        DB::table('nominals')->insert([
            'harga' => 100000,
        ]);

        DB::table('nominals')->insert([
            'harga' => 200000,
        ]);
    }
}
