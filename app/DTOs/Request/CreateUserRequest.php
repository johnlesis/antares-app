<?php

declare(strict_types=1);

namespace App\DTOs\Request;

use Antares\Validation\Attributes\Dto;
use Antares\Validation\Attributes\Email;
use Antares\Validation\Attributes\MinLength;

#[Dto]
final readonly class CreateUserRequest
{
    public function __construct(
        #[MinLength(2)]
        public string $name,

        #[Email]
        public string $email,

        #[MinLength(8)]
        public string $password,
    ) {}
}
