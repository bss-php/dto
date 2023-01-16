<?php

namespace bssphp\dto\Tests;

use bssphp\dto\AbstractData;
use bssphp\dto\Exceptions\InvalidDataException;
use bssphp\dto\Tests\Support\Classes\TestAbstractClass;
use bssphp\dto\Tests\Support\Classes\TestClass;
use bssphp\dto\Tests\Support\Classes\TestClassExtendsAbstractClass;
use bssphp\dto\Tests\Support\Classes\TestClassImplementsInterface;
use bssphp\dto\Tests\Support\Classes\TestClassImplementsInterfaceExtends;
use bssphp\dto\Tests\Support\Classes\TestClassOther;
use bssphp\dto\Tests\Support\Classes\TestInterface;

class ClassInheritanceTest extends TestCase
{
    public function testClass()
    {
        $data = new class(['object' => new TestClass()]) extends AbstractData {
            public TestClass $object;
        };

        self::assertInstanceOf(TestClass::class, $data->object);
    }

    public function testClassFailing()
    {
        $this->expectException(InvalidDataException::class);

        $data = new class(['object' => new TestClassOther()]) extends AbstractData {
            public TestClass $object;
        };
    }

    public function testInterface()
    {
        $data = new class(['object' => new TestClassImplementsInterface()]) extends AbstractData {
            public TestInterface $object;
        };

        self::assertInstanceOf(TestClassImplementsInterface::class, $data->object);
    }

    public function testInterfaceExtendedByClass()
    {
        $data = new class(['object' => new TestClassImplementsInterfaceExtends()]) extends AbstractData {
            public TestInterface $object;
        };

        self::assertInstanceOf(TestClassImplementsInterfaceExtends::class, $data->object);
    }

    public function testInterfaceFailing()
    {
        $this->expectException(InvalidDataException::class);

        new class(['object' => new TestClass()]) extends AbstractData {
            public TestInterface $object;
        };
    }

    public function testAbstractClass()
    {
        $data = new class(['object' => new TestClassExtendsAbstractClass()]) extends AbstractData {
            public TestAbstractClass $object;
        };

        self::assertInstanceOf(TestClassExtendsAbstractClass::class, $data->object);
    }
}
