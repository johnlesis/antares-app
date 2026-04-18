<?php

use App\Controllers\TestController;

return [
    ['GET',  '/',        TestController::class, 'index',  200],
    ['GET',  '/example', TestController::class, 'list',   200],
    ['POST', '/example', TestController::class, 'create', 201],
];