<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HabitatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_robot' => $this->faker->name,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => $this->faker->name,
            'meta_author' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'specs' => $this->faker->randomElement(['this is spec one', 'this is spec two', 'this is spec three', 'this is spec four']),
            'price' => $this->faker->randomFloat(),
            'discountPrice' => $this->faker->randomFloat(),
            'status' => $this->faker->randomElement(['new', 'hot', 'sale']),
            'category_id' => $this->faker->randomElement(['1', '2']),
            'pet_id' => $this->faker->randomElement(['1','2']),
            'star' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'stock' => $this->faker->randomElement(['12', '3', '0']),
            'discount' => $this->faker->boolean(),
            'rank' => $this->faker->randomElement(['1', '2', '3', '4']),
            'link' => $this->faker->url,
        ];
    }
}