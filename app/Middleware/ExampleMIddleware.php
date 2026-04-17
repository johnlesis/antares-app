<?php

declare(strict_types=1);

namespace App\Middleware;

use Antares\Middleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ExampleMiddleware implements MiddlewareInterface
{
    public function handle(
        ServerRequestInterface $request,
        callable $next
    ): ResponseInterface {
        // Before request
        // e.g. logging, auth, headers

        $response = $next($request);

        // After request
        // e.g. modify response

        return $response;
    }
}