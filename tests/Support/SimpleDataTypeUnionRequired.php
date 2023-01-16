<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;
use bssphp\dto\Attributes\Required;

class SimpleDataTypeUnionRequired extends AbstractData
{
    #[Required]
    public string|int $foo;
}
