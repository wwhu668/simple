<?php


namespace App\Services;


use App\Models\User;
use App\Services\Payment\PaymentInterface;
use App\Services\User\AbstractUser;

class OrderService extends AbstractUser implements PaymentInterface
{
    /**
     * 建立订单
     *
     * @param User $user
     * @return PaymentInterface
     */
    public function create(User $user) : PaymentInterface
    {
        
    }

    /**
     * 显示 User 工作
     *
     * @return void
     */
    function show()
    {
        // TODO: Implement show() method.
    }

    /**
     * 使用现金流付款
     *
     * @param int $amount
     * @return void
     */
    public function checkout(int $amount)
    {
        // TODO: Implement checkout() method.
    }
}