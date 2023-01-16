<?php

namespace bss-php\DTO\Tests;

use bss-php\DTO\Tests\Support\SimpleDataNullable;

class SerializationTest extends TestCase
{
    public function testSerialization()
    {
        $data = new SimpleDataNullable([
            'foo' => 'bar',
        ]);

        self::assertEquals('O:46:"bss-php\DTO\Tests\Support\SimpleDataNullable":1:{s:3:"foo";s:3:"bar";}', serialize($data));
    }
}
