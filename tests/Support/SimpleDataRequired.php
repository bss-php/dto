<?php

namespace bss-php\dto\Tests\Support;

use bss-php\dto\AbstractData;
use bss-php\dto\Attributes\Required;

class SimpleDataRequired extends AbstractData
{
    #[Required]
    public $foo;
}
