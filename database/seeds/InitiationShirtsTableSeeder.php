<?php

use Illuminate\Database\Seeder;

class InitiationShirtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('initiation_shirts')->insert([
            'size' => 'S',
            'quantity' => 10,
        ]);
        DB::table('initiation_shirts')->insert([
            'size' => 'M',
            'quantity' => 10,
        ]);
        DB::table('initiation_shirts')->insert([
            'size' => 'L',
            'quantity' => 10,
        ]);
        DB::table('initiation_shirts')->insert([
            'size' => 'XL',
            'quantity' => 10,
        ]);
        DB::table('initiation_shirts')->insert([
            'size' => 'XXL',
            'quantity' => 10,
        ]);
    }
}
