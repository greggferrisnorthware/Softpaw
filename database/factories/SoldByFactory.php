<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SoldByFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sold_by' => $this->faker->randomElement(['amazon sold by', 'chewy sold by'])
        ];
    }
}