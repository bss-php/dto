<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;

class SimpleDataTypeUnionNullable extends AbstractData
{
    public string|int|null $foo;
}
