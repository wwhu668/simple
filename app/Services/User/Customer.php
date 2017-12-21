<?php


namespace App\Services\User;


class Customer extends AbstractUser
{

    function show()
    {
        echo('I am a customer');
    }
}