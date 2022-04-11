<?php

namespace Database\Factories;

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
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'num_tel' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'adresse' => $this->faker->address(),
            'codePostal' => $this->faker->postcode(),
        ];
    }
}
