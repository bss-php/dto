<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;

class SimpleDataTypeUnionNullable extends AbstractData
{
    public string|int|null $foo;
}
