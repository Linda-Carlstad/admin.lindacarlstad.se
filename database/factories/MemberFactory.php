<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'idNumber' => '000102-1234',
        'verified' => now(),
    ];
});
