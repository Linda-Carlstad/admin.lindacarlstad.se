<?php

use Faker\Generator as Faker;

$factory->define(App\Overall::class, function (Faker $faker) {
    return [
        'size' => 'X',
        'quantity' => 5, 
    ];
});
