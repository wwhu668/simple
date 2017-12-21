<?php


namespace App\Services\Payment;


class AliPaySDK
{
    /**
     * @param $amount
     */
    public function bill($amount)
    {
        echo('AliPay bill ' . $amount);
    }
}