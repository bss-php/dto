<?php

namespace bss-php\DTO\Tests\Support;

use bss-php\DTO\AbstractData;

class SimpleDataNullableDefaultNull extends AbstractData
{
    public ?string $foo = null;
}
