<?php

use Controller\UserController;
use src\Router;

Router::post('/api/login', [UserController::class, 'login']);