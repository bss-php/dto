<?php

namespace bssphp\dto\Tests\Support;

use bssphp\dto\AbstractData;
use bssphp\dto\Attributes\Required;

class SimpleDataRequired extends AbstractData
{
    #[Required]
    public $foo;
}
