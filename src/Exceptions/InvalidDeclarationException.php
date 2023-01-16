<?php

declare(strict_types=1);

namespace bss-php\DTO\Exceptions;

use bss-php\DTO\Property;

class InvalidDeclarationException extends \RuntimeException
{
    public static function fromProperty(Property $property): self
    {
        return new self("The property `{$property->getName()}` has been declared as nullable with default value but marked as required");
    }
}
