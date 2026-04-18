<?php

declare(strict_types=1);

namespace App\Controllers;

use Antares\Router\Attributes\Get;

final class TestController
{
    #[Get('/test')]
    public function index(): array
    {
        return ['message' => 'test works'];
    }

    #[Get('/test2')]
    public function second(): array
    {
        return ['message' => 'test2 works'];
    }
}