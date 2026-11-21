<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Middleware\CorsMiddleware;
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use Antares\Application;

Application::create(__DIR__)
    ->providers([AppServiceProvider::class])
    ->routeProviders([RouteServiceProvider::class])
    ->middleware([CorsMiddleware::class])
    ->runWorker();