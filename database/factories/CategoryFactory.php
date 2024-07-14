<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Category::class;
    public function definition()
    {
        return [
            //
            'cat_name' => $this->faker->word,
            'cat_slug' => $this->faker->slug,
            'parent_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'status' => $this->faker->randomElement([1, 0]),

        ];
    }
}
