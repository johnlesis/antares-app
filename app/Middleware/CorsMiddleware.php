<?php

declare(strict_types=1);

namespace App\Middleware;

use Antares\Middleware\MiddlewareInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CorsMiddleware implements MiddlewareInterface
{
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/cors.php';
    }

    public function handle(ServerRequestInterface $request, callable $next): ResponseInterface
    {
        if ($request->getMethod() === 'OPTIONS') {
            return new Response(204, [
                'Access-Control-Allow-Origin'      => $this->config['origin'],
                'Access-Control-Allow-Methods'     => $this->config['methods'],
                'Access-Control-Allow-Headers'     => $this->config['headers'],
                'Access-Control-Max-Age'           => $this->config['max_age'],
                'Access-Control-Allow-Credentials' => $this->config['credentials'] ? 'true' : 'false',
            ]);
        }

        $response = $next($request);

        return $response
            ->withHeader('Access-Control-Allow-Origin', $this->config['origin'])
            ->withHeader('Access-Control-Allow-Methods', $this->config['methods'])
            ->withHeader('Access-Control-Allow-Headers', $this->config['headers'])
            ->withHeader('Access-Control-Expose-Headers', $this->config['exposed_headers'])
            ->withHeader('Access-Control-Allow-Credentials', $this->config['credentials'] ? 'true' : 'false');
    }
}