<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateLookUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'affiliate_look_up' => $this->faker->randomElement(['amazon affiliate', 'chewy affiliate'])
        ];
    }
}