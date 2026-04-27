<?php

declare(strict_types=1);

namespace App\Resolvers;

use Antares\Http\ResolverInterfaces\Resolver;
use Psr\Http\Message\ServerRequestInterface;

/**
 *
 * Usage in controller:
 *   #[Get('/profile')]
 *   public function profile(#[Auth] User $user): array
 */
final class PaginationResolver implements Resolver
{
    public function resolve(ServerRequestInterface $request): mixed
    {
        $params = $request->getQueryParams();
        return new Pagination(
            page: (int) ($params['page'] ?? 1),
            perPage: (int) ($params['per_page'] ?? 15),
        );
    }
}

class Pagination
{
    public function __construct( 
        public int $page,
        public int $perPage)
    {
    }
}
