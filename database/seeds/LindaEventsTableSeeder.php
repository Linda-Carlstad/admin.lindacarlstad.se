<?php

use Illuminate\Database\Seeder;
use App\LindaEvents;

class LindaEventsTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LindaEvents::factory()->count(5)->create();
    }
}