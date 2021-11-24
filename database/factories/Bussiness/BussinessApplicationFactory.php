<?php

namespace Database\Factories\Bussiness;

use Illuminate\Database\Eloquent\Factories\Factory;

class BussinessApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->company,
            'bussiness_email'=> $this->faker->email,
            'bussiness_phone'=> $this->faker->phoneNumber,
            'admin_name'=> $this->faker->name,
            'admin_email'=>  $this->faker->email,
        ];
    }
}
