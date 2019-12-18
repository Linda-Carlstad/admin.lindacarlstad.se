<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\InitiationShirts::class, function (Faker $faker) {
    return [
        'size' => 'X',
        'quantity' => 5,
    ];
});
