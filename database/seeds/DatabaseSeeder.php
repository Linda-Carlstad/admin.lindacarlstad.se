<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(OverallsTableSeeder::class);
        $this->call(BoardMembersTableSeeder::class);
        $this->call(InitiationShirtsTableSeeder::class);
        $this->call(LindaEventsTableSeeder::class);
    }
}
