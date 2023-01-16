<?php

namespace bss-php\dto\Tests;

use bss-php\dto\Tests\Support\SimpleDataNullable;

class SerializationTest extends TestCase
{
    public function testSerialization()
    {
        $data = new SimpleDataNullable([
            'foo' => 'bar',
        ]);

        self::assertEquals('O:46:"bss-php\dto\Tests\Support\SimpleDataNullable":1:{s:3:"foo";s:3:"bar";}', serialize($data));
    }
}
