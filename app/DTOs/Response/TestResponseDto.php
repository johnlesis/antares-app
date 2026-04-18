<?php

declare(strict_types=1);

namespace App\Responses;

use Antares\Serialization\Attributes\ResponseDto;
use Antares\Serialization\Attributes\Hide;
use Antares\Serialization\Attributes\SerializeAs;

#[ResponseDto(case: 'snake_case')]
final readonly class TestResponseDto
{
    public function __construct(
    ) {}
}