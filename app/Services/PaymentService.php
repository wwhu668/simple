<?php


namespace App\Services;


use App;
use App\Services\Payment\PaymentInterface;

class PaymentService
{
    /**
     * @var PaymentInterface
     */
    private $payment;

    /**
     * @param string $paymentName
     */
    public function setPayment(string $paymentName)
    {
        App::bind(PaymentInterface::class, 'App\Services\Payment\\' . $paymentName);
        $this->payment = App::make(PaymentInterface::class);
    }

    /**
     * 付款
     *
     * @param int $amount
     */
    public function checkout(int $amount)
    {
        $this->payment->checkout($amount);
    }
}