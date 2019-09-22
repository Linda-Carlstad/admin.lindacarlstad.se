<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'id_number' => $faker->macAddress,
        'email' => $faker->safeEmail,
        'membership' => date( 'Y' ),
    ];
});
