<?php

use Controller\DebtController;
use Controller\UserController;
use src\Router;

Router::post('/api/login', [UserController::class, 'login']);

Router::post('/api/add-debt', [DebtController::class, 'addDebt']);

Router::get('/api/debts', [DebtController::class, 'getDebts']);

Router::get('/api/debt/{id}', [DebtController::class, 'showDebtById']);