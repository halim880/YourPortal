<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory()->create()->id,
            'TIN'=> rand(1000000, 99999999),
            'phone'=> $this->faker->phoneNumber()
        ];
    }
}
