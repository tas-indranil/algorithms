<?php

interface IPaymentGateway
{
    public function processPayment(float $amount): bool;
}

class PayPalGateway implements IPaymentGateway
{

    public function processPayment(float $amount): bool
    {
        // Process payment via PayPal API
        echo "Processed payment of $amount via PayPal.\n";
        return true;
    }
}

class StripeGateway implements IPaymentGateway {
    public function processPayment(float $amount): bool {
        // Process payment via Stripe API
        echo "Processed payment of $amount via Stripe.\n";
        return true;
    }
}

class PaymentGatewayFactory {
    public static function createGateway(string $type): IPaymentGateway {
        switch ($type) {
            case 'paypal':
                return new PayPalGateway();
            case 'stripe':
                return new StripeGateway();
            default:
                throw new InvalidArgumentException("Invalid payment gateway type: $type");
        }
    }
}

$paypalGateway = PaymentGatewayFactory::createGateway('paypal');
$paypalGateway->processPayment(100);

$stripeGateway = PaymentGatewayFactory::createGateway('stripe');
$stripeGateway->processPayment(50);