<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StagingSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
            UserSeeder::class,
        ]);
    }
}
