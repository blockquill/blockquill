<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Enums\PostType;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->paragraphs(3, true),
            'excerpt' => $this->faker->optional()->sentence,
            'status' => $this->faker->randomElement(PostStatus::getValues()),
            'scheduled_at' => null,
            'type' => $this->faker->randomElement(PostType::getValues()),
            'featured_image_id' => null,
            'author_id' => User::query()->inRandomOrder()->first()->id ?? User::factory(),
            'published_at' => null,
        ];
    }
}
