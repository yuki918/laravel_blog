<?php

namespace Database\Factories;

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
            'title' => fake()->name(),
            'body' => fake()->realText($maxNbChars = 1000, $indexSize = 2),
            'thumbnail_path' => fake()->imageUrl(),
            // 'admin_user_id' => 1,
            'article_category_id' => 1,
            'is_pickup' => fake()->numberBetween(0, 1),
            'is_public' => fake()->numberBetween(0, 1),
        ];
    }
}
