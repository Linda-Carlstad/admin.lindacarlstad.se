<?php

use Illuminate\Database\Seeder;

class OverallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('overalls')->insert([
            'size' => 'S',
            'quantity' => 10,
        ]);
        DB::table('overalls')->insert([
            'size' => 'M',
            'quantity' => 10,
        ]);
        DB::table('overalls')->insert([
            'size' => 'L',
            'quantity' => 10,
        ]);
        DB::table('overalls')->insert([
            'size' => 'XL',
            'quantity' => 10,
        ]);
        DB::table('overalls')->insert([
            'size' => 'XXL',
            'quantity' => 10,
        ]);
    }
}
