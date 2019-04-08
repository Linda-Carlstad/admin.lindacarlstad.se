<?php

use Faker\Generator as Faker;

$factory->define(App\BoardMember::class, function (Faker $faker) {
    return [
        'position' => $faker->word,
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->safeEmail,
    ];
});
