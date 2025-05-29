<?php

namespace App\Services\Payment;

class PaymentFactory
{

    public function initializePayment($type): PaypalPaymentService|CreditCardPaymentService
    {
        if($type == "paypal"){
            return new PaypalPaymentService();
        }else if($type == "credit"){
            return new CreditCardPaymentService();
        }

        throw new \Exception("Invalid payment type");
    }
}
