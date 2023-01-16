<?php

namespace bss-php\dto\Tests;

use bss-php\dto\AbstractData;
use bss-php\dto\Attributes\Required;
use bss-php\dto\Exceptions\InvalidDataException;
use bss-php\dto\Exceptions\InvalidDeclarationException;
use bss-php\dto\Property;
use bss-php\dto\Tests\Support\SimpleData;
use bss-php\dto\Tests\Support\SimpleDataNullable;
use bss-php\dto\Tests\Support\SimpleDataNullableDefaultNull;
use bss-php\dto\Tests\Support\SimpleDataNullableDefaultNullRequired;
use bss-php\dto\Tests\Support\SimpleDataNullableRequired;
use bss-php\dto\Tests\Support\SimpleDataRequired;
use bss-php\dto\Tests\Support\SimpleDataTypeHinted;
use bss-php\dto\Tests\Support\SimpleDataTypeHintedRequired;
use bss-php\dto\Tests\Support\SimpleDataTypeUnion;
use bss-php\dto\Tests\Support\SimpleDataTypeUnionNullable;
use bss-php\dto\Tests\Support\SimpleDataTypeUnionNullableRequired;
use bss-php\dto\Tests\Support\SimpleDataTypeUnionRequired;
use bss-php\dto\Values\MissingValue;

class ValidationTest extends TestCase
{
    public function testValidation()
    {
        $property = Property::collectFromClass(SimpleData::class)['foo'];

        self::assertValid($property, '');
        self::assertValid($property, 1);
        self::assertValid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationRequired()
    {
        $property = Property::collectFromClass(SimpleDataRequired::class)['foo'];

        self::assertValid($property, '');
        self::assertValid($property, 1);
        self::assertValid($property, null);
        self::assertInvalid($property, new MissingValue());
    }

    public function testValidationTypeHinted()
    {
        $property = Property::collectFromClass(SimpleDataTypeHinted::class)['foo'];

        self::assertValid($property, '');
        self::assertInvalid($property, 1);
        self::assertInvalid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationTypeHintedRequired()
    {
        $property = Property::collectFromClass(SimpleDataTypeHintedRequired::class)['foo'];

        self::assertValid($property, '');
        self::assertInvalid($property, 1);
        self::assertInvalid($property, null);
        self::assertInvalid($property, new MissingValue());
    }

    public function testValidationTypeHintedUnion()
    {
        $property = Property::collectFromClass(SimpleDataTypeUnion::class)['foo'];

        self::assertValid($property, 'bar');
        self::assertValid($property, 1);
        self::assertInvalid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationTypeHintedUnionNullable()
    {
        $property = Property::collectFromClass(SimpleDataTypeUnionNullable::class)['foo'];

        self::assertValid($property, 'bar');
        self::assertValid($property, 1);
        self::assertValid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationTypeHintedUnionNullableRequired()
    {
        $property = Property::collectFromClass(SimpleDataTypeUnionNullableRequired::class)['foo'];

        self::assertValid($property, 'bar');
        self::assertValid($property, 1);
        self::assertValid($property, null);
        self::assertInvalid($property, new MissingValue());
    }

    public function testValidationTypeHintedUnionRequired()
    {
        $property = Property::collectFromClass(SimpleDataTypeUnionRequired::class)['foo'];

        self::assertValid($property, 'bar');
        self::assertValid($property, 1);
        self::assertInvalid($property, null);
        self::assertInvalid($property, new MissingValue());
    }

    public function testValidationNullable()
    {
        $property = Property::collectFromClass(SimpleDataNullable::class)['foo'];

        self::assertValid($property, '');
        self::assertInvalid($property, 1);
        self::assertValid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationNullableRequired()
    {
        $property = Property::collectFromClass(SimpleDataNullableRequired::class)['foo'];

        self::assertValid($property, '');
        self::assertInvalid($property, 1);
        self::assertValid($property, null);
        self::assertInvalid($property, new MissingValue());
    }

    public function testValidationNullableDefaultNull()
    {
        $property = Property::collectFromClass(SimpleDataNullableDefaultNull::class)['foo'];

        self::assertValid($property, '');
        self::assertInvalid($property, 1);
        self::assertValid($property, null);
        self::assertValid($property, new MissingValue());
    }

    public function testValidationNullableDefaultNullRequired()
    {
        $this->expectException(InvalidDeclarationException::class);

        Property::collectFromInstance(new SimpleDataNullableDefaultNullRequired())['foo'];
    }

    public function testExceptionPropertiesSet()
    {
        try {
            new class(['int' => null]) extends AbstractData {
                #[Required]
                public int $int;
            };

            self::fail();
        } catch (InvalidDataException $exception) {
            self::assertCount(1, $exception->getProperties());
            self::assertSame('int', $exception->getProperties()[0]->getName());
        }

        try {
            new class(['int' => '1']) extends AbstractData {
                public int $int;
            };

            self::fail();
        } catch (InvalidDataException $exception) {
            self::assertCount(1, $exception->getProperties());
            self::assertSame('int', $exception->getProperties()[0]->getName());
        }

        try {
            new class([]) extends AbstractData {
                #[Required]
                public int $foo;

                #[Required]
                public int $bar;
            };

            self::fail();
        } catch (InvalidDataException $exception) {
            self::assertCount(2, $exception->getProperties());
        }
    }
}
