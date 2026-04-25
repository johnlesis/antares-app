<?php

declare(strict_types=1);

namespace App\DTOs\Response;

use Antares\Serialization\Attributes\ResponseDto;
use Antares\Serialization\Attributes\Hide;
use Antares\Serialization\Attributes\SerializeAs;
use DateTimeImmutable;

#[ResponseDto(case: 'snake_case')]
final readonly class UserResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,

        #[Hide]
        public string $password,

        #[SerializeAs('member_since')]
        public DateTimeImmutable $createdAt,
    ) {}
}
