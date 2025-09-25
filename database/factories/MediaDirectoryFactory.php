<?php

namespace Database\Factories;

use App\Models\MediaDirectory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MediaDirectory>
 */
class MediaDirectoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'parent_id' => null,
        ];
    }
}
