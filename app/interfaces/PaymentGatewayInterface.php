<?php
namespace App\interfaces;


interface PaymentGatewayInterface
{
    public function processPayment($amount);
    public function refundPayment($transactionId);
    public function getTransactionStatus($transactionId);
}
