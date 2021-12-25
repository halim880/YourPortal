<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id'=> $this->clientId(),
            'title'=> $this->faker->sentence(),
            'description'=> $this->faker->sentence(20),
        ];
    }

    private function clientId(){
        $client = Client::first();
        if($client==null){
            return Client::factory()->create()->id;
        }
        return $client->id;
    }
}
