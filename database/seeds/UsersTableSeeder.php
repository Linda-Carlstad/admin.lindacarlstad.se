<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'email' => 'info@lindacarlstad.se',
           'password' => bcrypt('BytMigSnartLinda'),
           'created_at' => now(),
           'updated_at' => now(),
       ]);
    }
}
