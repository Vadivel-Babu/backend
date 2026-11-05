<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            // Generates a random fake sentence for the title (e.g., "The quick brown fox jumps")
            'title' => $this->faker->sentence(),
            // Generates a friendly, readable URL slug based on the title
            'slug' => $this->faker->slug(),
            // Generates 3 paragraphs of fake text for the body
            'content' => $this->faker->paragraphs(1, true),
            'category_id' => Category::factory()
        ];
    }
}
