<?php

namespace Database\Factories;

use App\Models\AffiliateLookUp;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\Pet;
use App\Models\SoldBy;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class AffiliateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'pet_id' => Pet::inRandomOrder()->first()->id,
            'status_id' => Status::inRandomOrder()->first()->id,
            'affiliate_look_up_id' => AffiliateLookUp::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'sold_by_id' => SoldBy::inRandomOrder()->first()->id,
            'delivery_id' => Delivery::inRandomOrder()->first()->id,
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'spec_1' => $this->faker->name,
            'spec_2' => $this->faker->name,
            'spec_3' => $this->faker->name,
            'spec_4' => $this->faker->name,
            'spec_1_name' => $this->faker->name,
            'spec_2_name' => $this->faker->name,
            'spec_3_name' => $this->faker->name,
            'spec_4_name' => $this->faker->name,
            'price' => $this->faker->randomFloat(),
            'discountPrice' => $this->faker->randomFloat(),
            'star' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'stock' => $this->faker->randomElement(['12', '3', '0']),
            'discount' => $this->faker->boolean(),
            'material' => $this->faker->randomElement(['material 1', 'material 2', 'material 3', 'material 4']),
            'rank' => $this->faker->randomElement(['1', '2', '3', '4']),
            'link' => $this->faker->url,
            'keywords' => $this->faker->randomElement(['this', 'is', 'spec', 'four'])
        ];
    }
}