<?php

use App\Controllers\ExampleController;

return [
    ['GET',  '/',        ExampleController::class, 'index',  200],
    ['GET',  '/example', ExampleController::class, 'list',   200],
    ['POST', '/example', ExampleController::class, 'create', 201],
];