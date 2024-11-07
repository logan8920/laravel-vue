<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Plan;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Plan::create([
            'name'=> 'Standard',
            'description' => 'Lorem ipsum',
            'price'=> 100,
            'type' => 'm',
            'benefits' => json_encode([
                [
                    'benefit' => '50GB Disk Space',
                    'status' => '1',
                ],
                [
                    'benefit' => '50 Email Accounts',
                    'status' => '1',
                ],
                [
                    'benefit' => '50GB Monthly Bandwidth',
                    'status' => '1',
                ],
                [
                    'benefit' => '10 Subdomains',
                    'status' => '0',
                ],
                [
                    'benefit' => '15 Domains',
                    'status' => '0',
                ],
            ]),
            'status' => '1',
            'color_code' => 'green',
        ]);

        Plan::create([
            'name'=> 'Business',
            'description' => 'Lorem ipsum',
            'price'=> 100,
            'type' => 'm',
            'benefits' => json_encode([
                [
                    'benefit' => '50GB Disk Space',
                    'status' => '1',
                ],
                [
                    'benefit' => '50 Email Accounts',
                    'status' => '1',
                ],
                [
                    'benefit' => '50GB Monthly Bandwidth',
                    'status' => '1',
                ],
                [
                    'benefit' => '10 Subdomains',
                    'status' => '1',
                ],
                [
                    'benefit' => '15 Domains',
                    'status' => '0',
                ],
            ]),
            'status' => '1',
            'color_code' => 'yellow',
        ]);

        Plan::create([
            'name'=> 'Premium',
            'description' => 'Lorem ipsum',
            'price'=> 100,
            'type' => 'm',
            'benefits' => json_encode([
                [
                    'benefit' => '50GB Disk Space',
                    'status' => '1',
                ],
                [
                    'benefit' => '50 Email Accounts',
                    'status' => '1',
                ],
                [
                    'benefit' => '50GB Monthly Bandwidth',
                    'status' => '1',
                ],
                [
                    'benefit' => '100 Subdomains',
                    'status' => '1',
                ],
                [
                    'benefit' => '150 Domains',
                    'status' => '1',
                ],
            ]),
            'status' => '1',
            'color_code' => 'blue',
        ]);
    }
}
