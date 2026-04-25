<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Antares\Application;
use App\Middleware\CorsMiddleware;
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;

Application::create(__DIR__ . '/..')
    ->providers([
        AppServiceProvider::class,
    ])
    ->routeProviders([
        RouteServiceProvider::class,
    ])
    ->middleware([
        CorsMiddleware::class,
    ])
    ->run();