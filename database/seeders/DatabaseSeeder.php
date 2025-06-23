<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            AdminUserSeeder::class,
            VendorSeeder::class,
        ]);

        // Seed test orders if Order model and factory exist
        if (class_exists(\App\Models\Order::class)) {
            \App\Models\Order::factory()->count(10)->create();
        }
    }
}
