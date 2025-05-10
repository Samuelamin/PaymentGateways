<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                [
                'name'   => 'Geidea',
                'value'  => 'geidea',
                'status' => 1,
                'data'   => json_encode([
                    'merchantId' => '1234567890',
                    'secretKey'  => 'your_secret_key',
                    'terminalId' => 'your_terminal_id',
                ])
            ],
            [
                'name'   => 'HyperPay',
                'value'  => 'HyperPay',
                'status' => 0,
                'data'   => json_encode([
                    'merchantId' => '1234567890',
                    'secretKey'  => 'your_secret_key',
                    'terminalId' => 'your_terminal_id',
                 ])
            ],
            [
                'name'   => 'NeoLeap',
                'value'  => 'NeoLeap',
                'status' => 0,
                'data'   => json_encode([
                    'merchantId' => '1234567890',
                    'secretKey'  => 'your_secret_key',
                    'terminalId' => 'your_terminal_id',
                 ])
            ],

        ];
        foreach ($data as $payment_data) {
            $check = Payment::where('value', $payment_data['value'])->first();
            if (!$check) {
                Payment::create([
                    'name' => $payment_data['name'],
                    'value' => $payment_data['value'],
                    'status' => $payment_data['status'],
                    'json_data' => $payment_data['data'],
                ]);
            }
        }

    }
}
