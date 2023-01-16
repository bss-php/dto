<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;
use bssphp\dto\Attributes\Required;

class SimpleDataTypeUnionNullableRequired extends AbstractData
{
    #[Required]
    public string|int|null $foo;
}
