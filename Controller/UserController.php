<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Model\User;
use Traits\Validator;

class UserController
{
    use Validator;

    public function get()
    {
        return 123;
    }

    #[NoReturn] public function login(): void
    {
        $userData = $this->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        if($user->getUser($userData['name'], $userData['password'])){
            apiResponse([
                'message' => 'User successfully logged in'
            ]);
        }
        apiResponse([
            'message' => 'Invalid username or password'
        ], 401);
    }
}