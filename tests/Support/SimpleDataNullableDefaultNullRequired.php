<?php

namespace bss-php\DTO\Tests\Support;

use bss-php\DTO\AbstractData;
use bss-php\DTO\Attributes\Required;

class SimpleDataNullableDefaultNullRequired extends AbstractData
{
    #[Required]
    public ?string $foo = null;
}
