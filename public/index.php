<?php

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

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