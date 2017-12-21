<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Payment\PaymentEnum;
use App\Services\PaymentService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
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
     * UsersController constructor.
     * @param UserService $userService
     * @param PaymentService $paymentService
     */
    public function __construct(UserService $userService, PaymentService $paymentService)
    {
        $this->userService = $userService;
        $this->paymentService = $paymentService;
    }


    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $this->userService->show('admin');
        $this->paymentService->setPayment(PaymentEnum::AliPay);
        $this->paymentService->checkout(1000);
//        return view('users.show', compact('user'));
    }
}
