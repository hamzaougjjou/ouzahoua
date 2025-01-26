<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PaymentGatewaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_gateways')->insert([
            [
                'name' => 'PayPal',
                'enabled' => true,
                'description' => 'A widely used online payment system that allows users to send and receive money.',
            ],
            [
                'name' => 'Credit Card',
                'enabled' => true,
                'description' => 'Payment via credit card, including Visa, MasterCard, and others.',
            ],
            [
                'name' => 'STC Pay',
                'enabled' => false,
                'description' => 'A mobile wallet payment method used widely in Saudi Arabia.',
            ],
            [
                'name' => 'Google Pay',
                'enabled' => true,
                'description' => 'Google\'s digital wallet platform and online payment system for mobile devices.',
            ],
            [
                'name' => 'Apple Pay',
                'enabled' => true,
                'description' => 'A mobile payment and digital wallet service by Apple that allows users to pay with their iPhone or Apple Watch.',
            ],
            [
                'name' => 'Mada',
                'enabled' => false,
                'description' => 'A Saudi-based payment network used for debit card payments.',
            ]
        ]);
    }
    
}
