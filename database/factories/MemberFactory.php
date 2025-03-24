<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'id_number' => $this->faker->macAddress,
            'email' => $this->faker->safeEmail,
            'membership' => date('Y'),
        ];
    }
}

// use Faker\Generator as Faker;
//
// $factory->define(App\Member::class, function (Faker $faker) {
//     return [
//         'firstName' => $faker->firstName,
//         'lastName' => $faker->lastName,
//         'id_number' => $faker->macAddress,
//         'email' => $faker->safeEmail,
//         'membership' => date( 'Y' ),
//     ];
// });
