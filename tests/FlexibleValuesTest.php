<?php

namespace bss-php\dto\Tests;

use bss-php\dto\AbstractData;
use bss-php\dto\Attributes\Flexible;
use bss-php\dto\Exceptions\InvalidDataException;
use bss-php\dto\Tests\Support\FlexibleData;

class FlexibleValuesTest extends TestCase
{
    public function testClassIsDetectedAsFlexible()
    {
        self::assertTrue(
            FlexibleData::isFlexible()
        );
    }

    public function testNotFlexibleFailing()
    {
        $this->expectException(InvalidDataException::class);

        new class(['foo' => 'bar']) extends AbstractData {
        };
    }

    public function testNotFlexibleFailingMultiple()
    {
        $this->expectException(InvalidDataException::class);

        new class(['foo' => 'bar', 'bar' => 'foo']) extends AbstractData {
        };
    }

    public function testOverloading()
    {
        $data = new #[Flexible] class(['foo' => 'bar']) extends AbstractData {
        };

        self::assertSame('bar', $data->foo);
    }

    public function testOverloadingWithExisting()
    {
        $data = new #[Flexible] class(['foo' => 'bar', 'bar' => 'foo']) extends AbstractData {
            public string $bar;
        };

        self::assertSame('bar', $data->foo);
        self::assertSame('foo', $data->bar);
    }
}
