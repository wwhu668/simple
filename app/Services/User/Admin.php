<?php


namespace App\Services\User;


class Admin extends AbstractUser
{
    function show()
    {
        echo('I am a admin');
    }

}