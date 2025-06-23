<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Users
        User::create([
            'name' => 'System Administrator',
            'email' => 'admin@bimbo.com',
            'password' => Hash::make('Admin@123!'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'IT Manager',
            'email' => 'it.manager@bimbo.com',
            'password' => Hash::make('IT@123!'),
            'role' => 'admin',
        ]);

        // Supplier Users
        User::create([
            'name' => 'John Smith',
            'email' => 'supplier@bimbo.com',
            'password' => Hash::make('Supplier@123!'),
            'role' => 'supplier',
        ]);

        User::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah.supplier@bimbo.com',
            'password' => Hash::make('Supplier@123!'),
            'role' => 'supplier',
        ]);

        // Bakery Managers
        User::create([
            'name' => 'Michael Brown',
            'email' => 'bakery@bimbo.com',
            'password' => Hash::make('Bakery@123!'),
            'role' => 'bakery_manager',
        ]);

        User::create([
            'name' => 'Emily Davis',
            'email' => 'emily.bakery@bimbo.com',
            'password' => Hash::make('Bakery@123!'),
            'role' => 'bakery_manager',
        ]);

        // Distributors
        User::create([
            'name' => 'Robert Wilson',
            'email' => 'distributor@bimbo.com',
            'password' => Hash::make('Distributor@123!'),
            'role' => 'distributor',
        ]);

        User::create([
            'name' => 'Lisa Anderson',
            'email' => 'lisa.distributor@bimbo.com',
            'password' => Hash::make('Distributor@123!'),
            'role' => 'distributor',
        ]);

        // Retail Managers
        User::create([
            'name' => 'David Taylor',
            'email' => 'retail@bimbo.com',
            'password' => Hash::make('Retail@123!'),
            'role' => 'retail_manager',
        ]);

        User::create([
            'name' => 'Jennifer Martinez',
            'email' => 'jennifer.retail@bimbo.com',
            'password' => Hash::make('Retail@123!'),
            'role' => 'retail_manager',
        ]);
    }
} 