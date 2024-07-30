<?php

namespace Database\Factories;

use App\Models\AffiliateLookUp;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CatTable;
use App\Models\Pet;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
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
            'meta_title' => $this->faker->name,
            'image' => 'placeholder.png',
            'image_large' => 'placeholder.png',
            'name' => $this->faker->name,
            'alternative_headline' => $this->faker->name,
            'description' => $this->faker->paragraph(12),
            'description_bottom' => $this->faker->paragraph(8),
            'author' => $this->faker->name,
            'slug' => $this->faker->slug(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'pet_id' => Pet::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'link' => $this->faker->url,
            'keywords' => $this->faker->randomElement(['this', 'is', 'spec', 'four'])
        ];
    }
}