<?php
namespace App\PaymentGateways\Payments;

use App\interfaces\PaymentGatewayInterface;

class HyperPayGateway implements PaymentGatewayInterface {

    private $paymentJsonFile;
    public function __construct($paymentJsonFile)
    {
        $this->paymentJsonFile = $paymentJsonFile;
    }


    public function processPayment($order_id) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;


        // Logic to process payment using HyperPay
        return "Processing payment of $order_id using HyperPay, ,  Merchant ID: $merchantId, Secret Key: $app_secret";
    }

    public function refundPayment($order_id) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;


        // Logic to refund payment using HyperPay
        return "Refunding payment with transaction ID: $order_id using HyperPay, ,  Merchant ID: $merchantId, Secret Key: $app_secret";
    }

    public function getTransactionStatus($order_id) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;


        // Logic to get transaction status using HyperPay
        return "Getting status for transaction ID: $order_id using HyperPay, ,  Merchant ID: $merchantId, Secret Key: $app_secret";
    }
}
