<?php

use App\BoardMember;
use Illuminate\Database\Seeder;

class BoardMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('board_members')->insert([
            'title' => 'Ordförande',
            'name' => 'Johanna Eriksson',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'ordforande@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'Vice ordförande',
            'name' => 'Jeanette Öhrström',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'vice@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'Kassör',
            'name' => 'Niklas Haugeneset',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'kassor@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'Sekreterare',
            'name' => 'Niklas Haugeneset',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'sekreterare@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'Sexmästare',
            'name' => 'Arvid Jansson',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'sexmastare@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'IT-ansvarig',
            'name' => 'Tom Olsson',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'it@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'PR-ansvarig',
            'name' => 'Malin Sannerstedt',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'pr@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'SNITS-ansvarig',
            'name' => 'Gustaf Brandorf',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'snits@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'SNITS-ansvarig',
            'name' => 'Julia Lissel',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'snits@lindacarlstad.se',
            'order' => 2,
        ]);
        DB::table('board_members')->insert([
            'title' => 'Utbildningsansvarig',
            'name' => 'Sandra Silander',
            'image' => '/img/logo.png',
            'description' => 'text text text',
            'email' => 'utbildning@lindacarlstad.se',
            'order' => 2,
        ]);
    }
}
