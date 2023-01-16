<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;
use bss-php\dto\Attributes\Required;

class SimpleDataTypeUnionRequired extends AbstractData
{
    #[Required]
    public string|int $foo;
}
