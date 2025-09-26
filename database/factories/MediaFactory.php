<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => $this->faker->word().'.'.$this->faker->fileExtension(),
            'slug' => $this->faker->unique()->slug(),
            'path' => $this->faker->filePath(),
            'mime_type' => $this->faker->mimeType(),
            'size' => $this->faker->numberBetween(1000, 1000000),
            'disk' => 'public',
            'title' => $this->faker->sentence(),
            'alt_text' => $this->faker->sentence(),
            'caption' => $this->faker->paragraph(),
            'uploaded_by' => User::query()->inRandomOrder()->first()->id ?? User::factory(),
            'media_directory_id' => null,
        ];
    }
}
