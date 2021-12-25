<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
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
            'member_email'=> $this->faker->email,
            'member_phone'=> $this->faker->phoneNumber(),
        ];
    }
}
