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
           'password' => bcrypt('m5BzvPy*38TYllklvq6Z^MiCEsU2&%G6dWCE7&j#Qz47i9LSks'),
       ]);
    }
}
