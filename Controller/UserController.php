<?php

namespace Controller;

use JetBrains\PhpStorm\NoReturn;
use Model\User;
use Random\RandomException;
use Traits\Validator;

class UserController
{
    use Validator;

    /**
     * @throws RandomException
     */
    #[NoReturn] public function login(): void
    {
        $userData = $this->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        if($user->getUser($userData['name'], $userData['password'])){
            apiResponse([
                'message' => 'User successfully logged in',
                'token' => $user->token,
            ]);
        }
        apiResponse([
            'message' => 'Invalid username or password'
        ], 401);
    }
}