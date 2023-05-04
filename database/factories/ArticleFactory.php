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
        return [
            //
            'title' => $this->faker->sentence(),
            // 'category_id' => $this->faker->numberBetween(1,3),
            // 'category_id' => Category::inRandomOrder()->first()->id,
            'text' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640,480),
        ];
    }
}
