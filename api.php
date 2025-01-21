<?php

use Controller\UserController;
use src\Router;
Router::post('/login', [UserController::class, 'login']);