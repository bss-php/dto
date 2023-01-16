<?php

namespace bss-php\dto\Tests;

use bss-php\dto\Cases\CamelCase;
use bss-php\dto\Cases\KebabCase;
use bss-php\dto\Cases\PascalCase;
use bss-php\dto\Cases\SnakeCase;
use bss-php\dto\Tests\Support\NestedData;

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
