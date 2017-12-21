<?php


namespace App\Services;


class PostService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * @return PaymentService
     */
    public function getPaymentService(): PaymentService
    {
        return $this->paymentService;
    }

    /**
     * @param PaymentService $paymentService
     */
    public function setPaymentService(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * PostService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
}