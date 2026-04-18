<?php

declare(strict_types=1);

namespace App\Guards;

use Antares\Exceptions\HttpException;
use Antares\Http\Guards\Guard;
use Psr\Http\Message\ServerRequestInterface;

final class CurrentUserGuard implements Guard
{
    public function resolve(ServerRequestInterface $request): mixed
    {
        $token = $request->getHeaderLine('Authorization');

        if (empty($token)) {
            throw new HttpException(401, 'Unauthorized');
        }

        return $token;
    }
}