<?php

declare(strict_types=1);

namespace App\Guards;

use Antares\Exceptions\HttpException;
use Antares\Http\ResolverInterfaces\Guard;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Example guard for authenticating requests.
 *
 * Usage in controller:
 *   #[Get('/profile')]
 *   public function profile(#[Auth] User $user): array
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
