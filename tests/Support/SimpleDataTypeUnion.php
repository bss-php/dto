<?php

namespace bss-php\DTO\Tests\Support;

use bss-php\DTO\AbstractData;

class SimpleDataTypeUnion extends AbstractData
{
    public string|int $foo;
}
