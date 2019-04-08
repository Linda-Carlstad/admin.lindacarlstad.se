<?php

use Illuminate\Database\Seeder;

class BoardMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('board_members')->insert([
            'position' => 'Ordförande',
            'name' => 'Johanna Eriksson',
            'description' => 'text text text',
            'email' => 'ordforande@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'Vice ordförande',
            'name' => 'Jeanette Öhrström',
            'description' => 'text text text',
            'email' => 'vice@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'Kassör',
            'name' => 'Niklas Haugeneset',
            'description' => 'text text text',
            'email' => 'kassor@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'Sekreterare',
            'name' => 'Niklas Haugeneset',
            'description' => 'text text text',
            'email' => 'sekreterare@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'Sexmästare',
            'name' => 'Arvid Jansson',
            'description' => 'text text text',
            'email' => 'sexmastare@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'IT-ansvarig',
            'name' => 'Tom Olsson',
            'description' => 'text text text',
            'email' => 'it@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'PR-ansvarig',
            'name' => 'Malin Sannerstedt',
            'description' => 'text text text',
            'email' => 'pr@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'SNITS-ansvarig',
            'name' => 'Gustaf Brandorf',
            'description' => 'text text text',
            'email' => 'snits@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'SNITS-ansvarig',
            'name' => 'Julia Lissel',
            'description' => 'text text text',
            'email' => 'snits@lindacarlstad.se',
        ]);
        DB::table('board_members')->insert([
            'position' => 'Utbildningsansvarig',
            'name' => 'Sandra Silander',
            'description' => 'text text text',
            'email' => 'utbildning@lindacarlstad.se',
        ]);
    }
}
