<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'super-admin@blockquill.com'],
            [
                'name' => 'Super Admin',
                'email' => 'super-admin@blockquill.com',
                'password' => bcrypt('password'),
            ]
        );
        $user->assignRole('super_admin');
    }
}
