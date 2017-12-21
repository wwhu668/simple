<?php


namespace App\Services\Payment;


class PayPal implements PaymentInterface
{
    /**
     * @var PayPalSDK
     */
    private $payPalSDK;

    /**
     * PayPal constructor.
     * @param PayPalSDK $payPalSDK
     */
    public function __construct(PayPalSDK $payPalSDK)
    {
        $this->payPalSDK = $payPalSDK;
    }

    /**
     * 使用现金流付款
     *
     * @param int $amount
     * @return void
     */
    public function checkout(int $amount)
    {
        $this->payPalSDK->pay($amount);
    }


}