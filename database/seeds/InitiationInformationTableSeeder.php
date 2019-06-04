<?php

use Illuminate\Database\Seeder;

class InitiationInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('initiation_information')->insert([
            'description' => 'test test test',
            'price' => 200,
            'showPrice' => true,
            'facebookGroup' => 'https://www.facebook.com/linda.carlstad/',
       ]);
    }
}
