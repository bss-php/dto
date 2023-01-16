<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;
use bss-php\dto\Attributes\Required;

class SimpleDataTypeUnionNullableRequired extends AbstractData
{
    #[Required]
    public string|int|null $foo;
}
