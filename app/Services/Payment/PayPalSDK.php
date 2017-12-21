<?php


namespace App\Services\Payment;


class PayPalSDK
{
    /**
     * @param int $amount
     */
    public function pay(int $amount)
    {
        echo('PayPal pay ' . $amount);
    }
}