<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;

class SimpleDataNullableDefaultNull extends AbstractData
{
    public ?string $foo = null;
}
