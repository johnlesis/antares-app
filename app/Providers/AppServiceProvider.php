<?php

declare(strict_types=1);

namespace App\Providers;

use Antares\ServiceProvider;
use Antares\Container\Container;

final class AppServiceProvider implements ServiceProvider
{
    public function register(Container $container): void
    {
        // Register your service bindings here
        // Example:
        // $container->singleton(DatabaseInterface::class, fn() => new Database($_ENV['DB_HOST'], ...));
    }
}