<?php

namespace bssphp\dto\Tests;

use bssphp\dto\Tests\Support\SimpleDataNullable;

class SerializationTest extends TestCase
{
    public function testSerialization()
    {
        $data = new SimpleDataNullable([
            'foo' => 'bar',
        ]);

        self::assertEquals('O:46:"bssphp\dto\Tests\Support\SimpleDataNullable":1:{s:3:"foo";s:3:"bar";}', serialize($data));
    }
}
