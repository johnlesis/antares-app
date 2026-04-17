<?php

declare(strict_types=1);

namespace App\DTOs;

use Antares\Validation\Attributes\MinLength;
use Antares\Validation\Attributes\MaxLength;

final readonly class ExampleRequest
{
    public function __construct(
        #[MinLength(2), MaxLength(100)]
        public string $name,

        public ?string $description = null,
    ) {}
}