<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::inRandomOrder();


        return [
            //
            'title' => $this->faker->sentence(),
            'text' => $this->faker->text(),
            // 'category_id' => Category::inRandomOrder()->first(),
            'category_id' => fake()->numberBetween(1,3),
            'image' => $this->faker->imageUrl(640,480),
        ];
    }
}
