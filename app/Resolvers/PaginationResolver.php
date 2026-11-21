<?php

declare(strict_types=1);

namespace App\Resolvers;

use Antares\Http\ResolverInterfaces\Resolver;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Reads ?page= and ?per_page= from the query string.
 *
 * Usage in a controller:
 *
 *   use Antares\Http\Attributes\Inject;
 *
 *   #[Get('/users')]
 *   public function index(#[Inject(PaginationResolver::class)] Pagination $pagination): array
 *   {
 *       return ['page' => $pagination->page, 'per_page' => $pagination->perPage];
 *   }
 */
final class PaginationResolver implements Resolver
{
    private const DEFAULT_PER_PAGE = 15;
    private const MAX_PER_PAGE = 100;

    public function resolve(ServerRequestInterface $request): Pagination
    {
        $params = $request->getQueryParams();

        return new Pagination(
            page: max(1, $this->int($params['page'] ?? null, 1)),
            perPage: min(self::MAX_PER_PAGE, max(1, $this->int($params['per_page'] ?? null, self::DEFAULT_PER_PAGE))),
        );
    }

    /** Invalid values (not a number, ?page[]=1, ...) fall back to the default. */
    private function int(mixed $value, int $default): int
    {
        $int = is_string($value) ? filter_var($value, FILTER_VALIDATE_INT) : false;
        return $int === false ? $default : $int;
    }
}
