<?php

namespace App\Services;

use App;
use App\Repositories\UserRepository;
use App\Services\User\AbstractUser;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(string $type)
    {
        App::bind(AbstractUser::class, 'App\Services\User\\' . ucfirst($type));
        App::make(AbstractUser::class)->show();
    }

    public function getAllUsers()
    {
        $users = $this->userRepository->getAllUsers();

        foreach ($users as $user) {
            echo $user->name;
        }
    }

}