<?php
namespace App\PaymentGateways;

use App\interfaces\PaymentGatewayInterface;

class PaymentContext{

    private $gateway;
    public function __construct( PaymentGatewayInterface $gateway){
        $this->gateway = $gateway;
    }

    public function processPayment($order_id){
        return $this->gateway->processPayment($order_id);
    }

    public function refundPayment($order_id){
        return $this->gateway->refundPayment($order_id);
    }

    public function getTransactionStatus($order_id){
        return $this->gateway->getTransactionStatus($order_id);
    }


}
