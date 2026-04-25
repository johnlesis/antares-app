<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use Antares\Application;

Application::create(__DIR__)
    ->providers([AppServiceProvider::class])
    ->routeProviders([RouteServiceProvider::class])
    ->runSwoole(
        host: $_ENV['SWOOLE_HOST'] ?? '0.0.0.0',
        port: (int) ($_ENV['SWOOLE_PORT'] ?? 8000),
    );