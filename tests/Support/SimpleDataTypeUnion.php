<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;

class SimpleDataTypeUnion extends AbstractData
{
    public string|int $foo;
}
