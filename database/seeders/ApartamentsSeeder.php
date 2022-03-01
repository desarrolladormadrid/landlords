<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartamentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apartaments')->insert([
            'title' => 'Studio apartament for rent in Goya, Madrid',
            'user_id' => 1,
            'available' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


        ]);
        DB::table('apartaments')->insert([
            'title' => '2 bedrooms apartament for rent in Malasaña, Madrid',
            'user_id' => 2,
            'available' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('apartaments')->insert([
            'title' => 'Rooftop for rent in Chamberi, Madrid',
            'user_id' => 1,
            'available' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('apartaments')->insert([
            'title' => 'Apartament in Coslada, Madrid',
            'user_id' => 3,
            'available' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
