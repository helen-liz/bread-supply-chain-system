<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            [
                'name' => 'Bimbo Bakeries USA',
                'email' => 'contact@bimbobakeries.com',
                'phone' => '+1 (800) 555-0123',
                'address' => '123 Baker Street',
                'city' => 'Fort Worth',
                'state' => 'TX',
                'zip_code' => '76102',
                'business_type' => 'Manufacturer',
                'tax_id' => '12-3456789',
                'business_license' => 'MB-123456',
                'status' => 'active',
            ],
            [
                'name' => 'Sara Lee Bakery',
                'email' => 'info@saralee.com',
                'phone' => '+1 (800) 555-0124',
                'address' => '456 Bread Avenue',
                'city' => 'Chicago',
                'state' => 'IL',
                'zip_code' => '60601',
                'business_type' => 'Manufacturer',
                'tax_id' => '98-7654321',
                'business_license' => 'MB-234567',
                'status' => 'active',
            ],
            [
                'name' => 'Wonder Bread',
                'email' => 'sales@wonderbread.com',
                'phone' => '+1 (800) 555-0125',
                'address' => '789 Flour Road',
                'city' => 'Kansas City',
                'state' => 'MO',
                'zip_code' => '64111',
                'business_type' => 'Manufacturer',
                'tax_id' => '45-6789123',
                'business_license' => 'MB-345678',
                'status' => 'active',
            ],
            [
                'name' => 'Hostess Brands',
                'email' => 'contact@hostess.com',
                'phone' => '+1 (800) 555-0126',
                'address' => '321 Sweet Street',
                'city' => 'Lenexa',
                'state' => 'KS',
                'zip_code' => '66219',
                'business_type' => 'Manufacturer',
                'tax_id' => '78-9123456',
                'business_license' => 'MB-456789',
                'status' => 'active',
            ],
            [
                'name' => 'Entenmann\'s Bakery',
                'email' => 'info@entenmanns.com',
                'phone' => '+1 (800) 555-0127',
                'address' => '654 Pastry Lane',
                'city' => 'Bay Shore',
                'state' => 'NY',
                'zip_code' => '11706',
                'business_type' => 'Manufacturer',
                'tax_id' => '23-4567891',
                'business_license' => 'MB-567890',
                'status' => 'active',
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
} 