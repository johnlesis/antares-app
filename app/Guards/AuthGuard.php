<?php

declare(strict_types=1);

namespace App\Guards;

use Antares\Exceptions\HttpException;
use Antares\Http\ResolverInterfaces\Guard;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Example guard for authenticating requests.
 *
 * Usage in a controller:
 *
 *   use Antares\Http\Attributes\Guard;
 *
 *   #[Get('/profile')]
 *   public function profile(#[Guard(AuthGuard::class)] array $auth): array
 *   {
 *       return ['token' => $auth['token']];
 *   }
 *
 * Declare guard parameters first: parameters are resolved in order, so a guard
 * listed before the request DTO stops unauthenticated requests before the body is read.
 */
final class AuthGuard implements Guard
{
    public function resolve(ServerRequestInterface $request): mixed
    {
        $header = $request->getHeaderLine('Authorization');

        if (empty($header) || !str_starts_with($header, 'Bearer ')) {
            throw new HttpException(401, 'Missing or invalid Authorization header');
        }

        $token = substr($header, 7);

        // TODO: Validate token and return authenticated user
        // Example: return $this->userRepository->findByToken($token);

        return ['token' => $token];
    }
}
