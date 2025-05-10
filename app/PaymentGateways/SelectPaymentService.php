<?php
namespace App\PaymentGateways;

use App\Models\Payment;
use App\PaymentGateways\Payments\GeideaGateway;
use App\PaymentGateways\Payments\HyperPayGateway;
use App\PaymentGateways\Payments\NeoLeapGateway;

class SelectPaymentService
{
    function selectPaymentGateway($gatewayName)
    {
        switch ($gatewayName) {
            case 'Geidea':
                $jsonFile = $this->getPaymentData($gatewayName);
                $gateway = new GeideaGateway($jsonFile);
                break;

            case 'NeoLeap':
                $jsonFile = $this->getPaymentData($gatewayName);
                $gateway = new NeoLeapGateway($jsonFile);
                break;

            case 'HyperPay':
                $jsonFile = $this->getPaymentData($gatewayName);
                $gateway = new HyperPayGateway($jsonFile);
                break;
            default:
                throw new \Exception("Payment gateway not supported.");

        }
        $PaymentContext = new PaymentContext($gateway);
        return $PaymentContext;
    }


    function getPaymentData ($gatewayName)
    {
        $gateway =  Payment::active()->where('value',$gatewayName)->first();;
        if (!$gateway) {
            throw new \Exception("Payment gateway not found.");
        }
        return json_decode($gateway->json_data);
    }
}
