<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Basic Plan',
                'stripe_price_id' => 'price_1Basic123456789',
                'price' => 9.99,
                'interval' => 'monthly',
                'description' => 'Basic plan for personal use.',
            ],
            [
                'name' => 'Standard Plan',
                'stripe_price_id' => 'price_1Standard123456',
                'price' => 19.99,
                'interval' => 'monthly',
                'description' => 'Standard plan for small teams.',
            ],
            [
                'name' => 'Premium Plan',
                'stripe_price_id' => 'price_1Premium123456',
                'price' => 49.99,
                'interval' => 'monthly',
                'description' => 'Premium plan for enterprises.',
            ],
            [
                'name' => 'Annual Plan',
                'stripe_price_id' => 'price_1Annual123456',
                'price' => 99.99,
                'interval' => 'yearly',
                'description' => 'Annual subscription for cost saving.',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
