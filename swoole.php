<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

// Load .env now: SWOOLE_HOST and SWOOLE_PORT are read below, before the app boots.
Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();

use App\Middleware\CorsMiddleware;
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use Antares\Application;

Application::create(__DIR__)
    ->providers([AppServiceProvider::class])
    ->routeProviders([RouteServiceProvider::class])
    ->middleware([CorsMiddleware::class])
    ->runSwoole(
        host: getenv('SWOOLE_HOST') ?: ($_ENV['SWOOLE_HOST'] ?? '0.0.0.0'),
        port: (int) (getenv('SWOOLE_PORT') ?: ($_ENV['SWOOLE_PORT'] ?? 8000)),
    );