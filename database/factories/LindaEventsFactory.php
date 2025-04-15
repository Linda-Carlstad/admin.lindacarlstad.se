<?php

namespace Database\Factories;

use App\LindaEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class LindaEventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LindaEvents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startTime = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('now', '+1 month')->getTimestamp());
        return [
            'name' => $this->faker->word,
            'starts' => $startTime,
            'ends' => Carbon::createFromFormat('Y-m-d H:i:s', $startTime)->addHours(2),
            'status' => 'confirmed',
            'summary' => $this->faker->word,
            'location' => $this->faker->word,
            'uid' => $this->faker->uuid,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}