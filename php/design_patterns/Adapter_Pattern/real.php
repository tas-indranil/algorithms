<?php

interface PaymentGateway
{
    public function pay($amount);
}

class Paypal
{
    public function sendPayment($amount)
    {
        echo "Paying $amount via PayPal.\n";
    }
}

// Adapter for PayPal to implement PaymentGateway interface
class PayPalAdapter implements PaymentGateway
{
    private $paypal;

    public function __construct(Paypal $paypal)
    {
        $this->paypal = $paypal;
    }

    public function pay($amount)
    {
        $this->paypal->sendPayment($amount);
    }
}

class Stripe
{
    public function sendPayment($amount)
    {
        echo "Paying $amount via Stripe.\n";
    }
}

class StripeAdapter implements PaymentGateway
{
    private $stripe;

    public function __construct(Stripe $stripe)
    {
        $this->stripe = $stripe;
    }

    public function pay($amount)
    {
        $this->stripe->sendPayment($amount);
    }
}

// Client code using the PaymentGateway interface
function processPayment(PaymentGateway $paymentGateway, $amount): void
{
    $paymentGateway->pay($amount);
}

$paypal = new Paypal();
$paypalAdapter = new PayPalAdapter($paypal);
processPayment($paypalAdapter, 12);

$stripe = new Stripe();
$stripeAdapter = new StripeAdapter($stripe);
processPayment($stripeAdapter, 150);