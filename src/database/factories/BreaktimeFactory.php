<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\CarbonImmutable;

class BreaktimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween($min = 1,$max = 50),
            'start_time'=>$this->faker->dateTime(),
            'end_time'=>$this->faker->dateTime(),
            'total_time'=>$this->faker->numberBetween($min = 360,$max = 5000)

            //
        ];
    }
}
