<?php

declare(strict_types=1);

namespace App\Providers;

use Antares\ServiceProvider;
use Antares\Container\Container;

final class AppServiceProvider implements ServiceProvider
{
    public function register(Container $container): void
    {
        // Register your service bindings here. Examples:
        //
        // One instance for the whole process (database connections, clients, config):
        // $container->singleton(DatabaseInterface::class, fn () => new Database($_ENV['DB_HOST'], ...));
        //
        // One instance per request (current user, tenant, request context):
        // $container->scoped(CurrentUser::class, fn () => new CurrentUser());
        //
        // An interface resolved to a concrete class:
        // $container->bind(MailerInterface::class, SmtpMailer::class);
    }
}