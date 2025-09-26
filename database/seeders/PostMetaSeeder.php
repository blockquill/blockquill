<?php

namespace Database\Seeders;

use App\Models\PostMeta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostMeta::factory()->count(50)->create();
    }
}
