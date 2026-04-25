<?php

declare(strict_types=1);

namespace App\Providers;

use Antares\ServiceProvider;
use Antares\Container\Container;
use Antares\Router\Router;
use App\Controllers\WelcomeController;

final class RouteServiceProvider implements ServiceProvider
{
    public function register(Container $container): void
    {
        $router = $container->make(Router::class);

        // Register controllers with attribute-based routes
        $router->register(WelcomeController::class);

        // Alternative: file-based routing
        // $router->registerFromConfig(require __DIR__ . '/../../config/routes.php');

        // Alternative: YAML-based routing (requires symfony/yaml)
        // $router->registerFromYaml(__DIR__ . '/../../config/routes.yaml');
    }
}