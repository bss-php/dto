<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;
use bssphp\dto\Attributes\Required;

class SimpleDataNullableDefaultNullRequired extends AbstractData
{
    #[Required]
    public ?string $foo = null;
}
