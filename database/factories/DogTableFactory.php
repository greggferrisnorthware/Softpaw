<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'breed' => $this->faker->randomElement([
                'Abyssinian Cat',
                'American Bobtail Cat Breed',
                'American Curl Cat Breed',
                'American Shorthair Cat',
                'American Wirehair Cat Breed',
                'Balinese-Javanese Cat Breed',
                'Bengal Cat ',
                'Birman Cat Breed',
                'Bombay Cat',
                'British Shorthair Cat Breed',
                'Burmese Cat',
                'Chartreux Cat Breed',
                'Cornish Rex Cat Breed',
                'Devon Rex Cat Breed',
                'Egyptian Mau Cat',
                'European Burmese Cat Breed',
                'Exotic Shorthair Cat Breed',
                'Havana Brown Cat Breed',
                'Himalayan Cat Breed',
                'Japanese Bobtail Cat Breed',
                'Korat Cat Breed',
                'LaPerm Cat',
                'Maine Coon Cat Breed',
                'Manx Cat',
                'Munchkin Cat ',
                'Norwegian Forest Cat Breed',
                'Ocicat Cat Breed',
                'Oriental Cat Breed',
                'Persian Cat Breed',
                'Peterbald Cat Breed',
                'Pixiebob Cat Breed',
                'Ragamuffin Cat Breed',
                'Ragdoll Cat Breed',
                'Russian Blue Cat Breed',
                'Savannah Cat Breed',
                'Scottish Fold Cat Breed',
                'Selkirk Rex Cat Breed',
                'Siamese Cat Breed',
                'Siberian Cat Breed',
                'Singapura Cat Breed',
                'Somali Cat Breed',
                'Sphynx Cat Breed',
                'Tonkinese Cat Breed',
                'Toyger Cat Breed',
                'Turkish Angora Cat Breed',
                'Turkish Van Cat Breed'
            ]),
            'size' => $this->faker->randomElement(['small','large']),
            'weight' => $this->faker->randomElement(['0-7','7-12','12-20','20+']),
            'coat' => $this->faker->randomElement(['short','medium','long']),
            'color' => $this->faker->randomElement(['low','medium','high']),
            'temperament' => $this->faker->randomElement(['low','medium','high']),
            'characteristics' => $this->faker->randomElement(['bla ...','bla ...','bla ...']),
            'energy' => $this->faker->randomElement(['low','medium','high']),
            'shedding' => $this->faker->randomElement(['light','medium','heavy']),
            'health' => $this->faker->randomElement(['poor','good','great']),
            'food' => $this->faker->randomElement(['bla ...','bla ...','bla ...']),
            'history' => $this->faker->randomElement(['bla ...','bla ...','bla ...']),
            'category_id' => Category::inRandomOrder()->first()->id,
            'pet_id' => Pet::inRandomOrder()->first()->id,
        ];
    }
}