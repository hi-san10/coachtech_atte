<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorktimeFactory extends Factory
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
            'start_time'=>$this->faker->dateTimeBetween('-3month'),
            'end_time'=>$this->faker->dateTimeBetween('-3month'),
            'break_total_time'=>$this->faker->time(),
            'actual_working_time'=>$this->faker->time()
            //
        ];
    }
}
