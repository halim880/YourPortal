<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BussinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->company(),
            'bussiness_email'=> $this->faker->email,
            'bussiness_phone'=> $this->faker->phoneNumber(),
        ];
    }
}
