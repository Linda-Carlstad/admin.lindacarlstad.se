<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'id_number' => $faker->year( 'now' ),
        'email' => $faker->safeEmail,
        'membership' => 'Livstid',
        'start' => date( "Y" ),
    ];
});
