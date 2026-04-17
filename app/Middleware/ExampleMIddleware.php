<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ExampleMiddleware
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