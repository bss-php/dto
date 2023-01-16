<?php

namespace bssphp\dto\Tests;

use bssphp\dto\Cases\CamelCase;
use bssphp\dto\Cases\KebabCase;
use bssphp\dto\Cases\PascalCase;
use bssphp\dto\Cases\SnakeCase;
use bssphp\dto\Tests\Support\NestedData;

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
