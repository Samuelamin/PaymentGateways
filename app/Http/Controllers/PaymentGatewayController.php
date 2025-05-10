<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\PaymentGateways\PaymentContext;
use Illuminate\Http\Request;
use App\PaymentGateways\SelectPaymentService;

class PaymentGatewayController extends Controller
{
    private $selectPaymentService;
    public function __construct(SelectPaymentService $selectPaymentService)
    {
        $this->selectPaymentService = $selectPaymentService;
    }

    function selectPaymentGateway(){
        $data = Payment::active()->first();
        if (!$data) {
            return response()->json([
                'error' => 'No active payment gateway configured.'
            ], 422);
        }

        $gatewayName = $data->value ?? null;
        $order_id = 123;
        $payment = $this->selectPaymentService->selectPaymentGateway($gatewayName);
        return $payment->processPayment($order_id );
    }
}
