<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pet' => $this->faker->unique()->randomElement(['cat', 'kitten', 'dog', 'puppy'])
        ];
    }
}