<?php
namespace App\PaymentGateways\Payments;
use App\interfaces\PaymentGatewayInterface;
use App\PaymentGateways\SelectPaymentService;

class GeideaGateway implements PaymentGatewayInterface {

    private $paymentJsonFile;
    public function __construct($paymentJsonFile)
    {
        $this->paymentJsonFile = $paymentJsonFile;
    }

     public function processPayment($order_id) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;

        // Logic to process payment using Geidea
        $signature = $this->generate_signature($merchantId, $app_secret ,$order_id);
        return  $signature;
    }


    public function refundPayment($transactionId) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;

        // Logic to refund payment using Geidea
        return "Refunding payment with transaction ID: $transactionId using Geidea , public key: $merchantId and private key: $app_secret.";
    }


    public function getTransactionStatus($transactionId) {
        $merchantId = $this->paymentJsonFile->merchantId;
        $app_secret = $this->paymentJsonFile->secretKey;

        // Logic to get transaction status using Geidea
        return "Getting status for transaction ID: $transactionId using Geidea , public key: $merchantId and private key: $app_secret.";
    }


    public function generate_signature($merchantId, $private_key ,$data) {
        // Logic to generate signature using Geidea
        return "Generating signature for data: $data using public key: $merchantId and private key: $private_key.";
    }
}

