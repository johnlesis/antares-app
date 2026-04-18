<?php 

namespace App\Middleware;

use Antares\Middleware\MiddlewareInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CorsMiddleware implements MiddlewareInterface
{
    public function handle(ServerRequestInterface $request, callable $next): ResponseInterface
    {
        $config = require __DIR__ . '/../../config/cors.php';

        if ($request->getMethod() === 'OPTIONS') {
            return new Response(204, [
                'Access-Control-Allow-Origin'      => $config['origin'],
                'Access-Control-Allow-Methods'     => $config['methods'],
                'Access-Control-Allow-Headers'     => $config['headers'],
                'Access-Control-Max-Age'           => $config['max_age'],
                'Access-Control-Allow-Credentials' => $config['credentials'] ? 'true' : 'false',
            ]);
        }

        $response = $next($request);

        return $response
            ->withHeader('Access-Control-Allow-Origin', $config['origin'])
            ->withHeader('Access-Control-Allow-Methods', $config['methods'])
            ->withHeader('Access-Control-Allow-Headers', $config['headers'])
            ->withHeader('Access-Control-Expose-Headers', $config['exposed_headers'])
            ->withHeader('Access-Control-Allow-Credentials', $config['credentials'] ? 'true' : 'false');
    }
}