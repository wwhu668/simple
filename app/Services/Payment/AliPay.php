<?php


namespace App\Services\Payment;


class AliPay implements PaymentInterface
{

    /**
     * @var AliPaySDK
     */
    private $aliPaySDK;

    /**
     * AliPay constructor.
     * @param AliPaySDK $aliPaySDK
     */
    public function __construct(AliPaySDK $aliPaySDK)
    {
        $this->aliPaySDK = $aliPaySDK;
    }

    /**
     * 使用现金流付款
     *
     * @param int $amount
     * @return void
     */
    public function checkout(int $amount)
    {
        $this->aliPaySDK->bill($amount);
    }


}