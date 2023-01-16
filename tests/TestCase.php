<?php

namespace bss-php\dto\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use bss-php\dto\Property;

abstract class TestCase extends BaseTestCase
{
    protected static function assertValid(Property $property, $value)
    {
        self::assertTrue($property->isValid($value), ($error = $property->getError($value)) ? $error->getMessage() : '');
    }

    protected static function assertInvalid(Property $property, $value)
    {
        self::assertFalse($property->isValid($value));
    }
}
