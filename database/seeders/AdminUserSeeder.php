<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bimbo.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('Admin@123!'),
                'role' => 'admin',
            ]
        );
    }
} 