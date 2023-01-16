<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;

class SimpleDataNullableDefaultNull extends AbstractData
{
    public ?string $foo = null;
}
