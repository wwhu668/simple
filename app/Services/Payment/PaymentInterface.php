<?php


namespace App\Services\Payment;


interface PaymentInterface
{
    /**
     * 使用现金流付款
     *
     * @param int $amount
     * @return mixed
     */
    public function checkout(int $amount);
}