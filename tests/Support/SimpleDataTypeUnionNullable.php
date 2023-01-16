<?php

namespace bss-php\DTO\Tests\Support;

use bss-php\DTO\AbstractData;

class SimpleDataTypeUnionNullable extends AbstractData
{
    public string|int|null $foo;
}
