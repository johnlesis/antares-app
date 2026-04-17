<?php

declare(strict_types=1);

namespace App\Providers;

use Antares\ServiceProvider;
use Antares\Container\Container;

final class AppServiceProvider implements ServiceProvider
{
    public function register(Container $container): void
    {
        //example
        // $container->singleton(Database::class, function () {
        //     return new Database(
        //         $_ENV['DB_DRIVER'],
        //         $_ENV['DB_HOST'],
        //         $_ENV['DB_PORT'],
        //         $_ENV['DB_DATABASE'],
        //         $_ENV['DB_USERNAME'],
        //         $_ENV['DB_PASSWORD'],
        //     );
        // });
    }
}