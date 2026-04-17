<?php

declare(strict_types=1);

namespace App\Providers;

use Antares\ServiceProvider;
use Antares\Container\Container;
use Antares\Router\Router;
use App\Controllers\ExampleController;

final class RouteServiceProvider implements ServiceProvider
{
    public function register(Container $container): void
    {
        $router = $container->make(Router::class);

        $router->register(ExampleController::class);

        // $router->registerFromConfig(require __DIR__ . '/../../config/routes.php');
        // $router->registerFromYaml(__DIR__ . '/../../config/routes.yaml');
    }
}