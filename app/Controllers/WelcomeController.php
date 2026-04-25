<?php

declare(strict_types=1);

namespace App\Controllers;

use Antares\Router\Attributes\Get;

final class WelcomeController
{
    #[Get('/')]
    public function index(): array
    {
        return [
            'message' => 'Welcome to Antares Framework',
            'docs' => '/docs',
        ];
    }

    #[Get('/health')]
    public function health(): array
    {
        return ['status' => 'ok'];
    }
}
