<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;

class SimpleDataTypeUnion extends AbstractData
{
    public string|int $foo;
}
