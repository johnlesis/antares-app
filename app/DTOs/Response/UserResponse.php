<?php

declare(strict_types=1);

namespace App\DTOs\Response;

use Antares\Serialization\Attributes\ResponseDto;
use Antares\Serialization\Attributes\Hide;
use Antares\Serialization\Attributes\SerializeAs;
use Antares\Serialization\CaseStyle;

/**
 * Output: {"id": 1, "name": "…", "email": "…", "member_since": "2026-01-15T10:30:00+00:00"}
 *
 * Dates are passed in as strings: the serializer outputs objects that aren't
 * #[ResponseDto] as-is, so format them first, e.g. $user->createdAt->format(DATE_ATOM).
 */
#[ResponseDto(case: CaseStyle::SnakeCase)]
final readonly class UserResponse
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,

        #[Hide]
        public string $password,

        #[SerializeAs('member_since')]
        public string $createdAt,
    ) {}
}
