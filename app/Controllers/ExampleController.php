<?php

declare(strict_types=1);

namespace App\Controllers;

use Antares\Router\Attributes\Get;
use Antares\Router\Attributes\Post;
use App\DTOs\ExampleRequest;

final class ExampleController
{
    #[Get('/')]
    public function index(): array
    {
        return [
            'framework' => 'Antares',
            'version'   => '0.1.0',
            'message'   => 'Welcome to Antares!',
        ];
    }

    #[Get('/example')]
    public function list(int $page = 1, int $limit = 10): array
    {
        return [
            'page'  => $page,
            'limit' => $limit,
            'data'  => [],
        ];
    }

    #[Post('/example')]
    public function create(ExampleRequest $body): array
    {
        return [
            'name'    => $body->name,
            'message' => 'Created successfully',
        ];
    }
}