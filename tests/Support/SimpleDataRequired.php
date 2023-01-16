<?php

namespace bss-php\DTO\Tests\Support;

use bss-php\DTO\AbstractData;
use bss-php\DTO\Attributes\Required;

class SimpleDataRequired extends AbstractData
{
    #[Required]
    public $foo;
}
