<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;
use bssphp\dto\Attributes\Required;

class SimpleDataTypeHintedRequired extends AbstractData
{
    #[Required]
    public string $foo;
}
