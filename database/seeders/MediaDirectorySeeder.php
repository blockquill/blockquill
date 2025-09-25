<?php

namespace Database\Seeders;

use App\Models\MediaDirectory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaDirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MediaDirectory::factory()->count(10)->create();
    }
}
