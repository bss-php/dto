<?php

namespace bss-php\DTO\Tests;

use bss-php\DTO\Cases\CamelCase;
use bss-php\DTO\Cases\KebabCase;
use bss-php\DTO\Cases\PascalCase;
use bss-php\DTO\Cases\SnakeCase;
use bss-php\DTO\Tests\Support\NestedData;

class NestedDataValuesTest extends TestCase
{
    public function testNestedDataRespectsRecursiveKeys()
    {
        $data = new NestedData([
            'childData' => new NestedData([
                'childData' => new NestedData([]),
            ]),
        ]);

        self::assertEquals(['childData' => ['childData' => []]], $data->toArray());
        self::assertEquals(['childData' => ['childData' => []]], $data->toArrayConverted(CamelCase::class));
        self::assertEquals(['child-data' => ['child-data' => []]], $data->toArrayConverted(KebabCase::class));
        self::assertEquals(['ChildData' => ['ChildData' => []]], $data->toArrayConverted(PascalCase::class));
        self::assertEquals(['child_data' => ['child_data' => []]], $data->toArrayConverted(SnakeCase::class));
    }
}
