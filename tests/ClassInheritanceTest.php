<?php

namespace bss-php\dto\Tests;

use bss-php\dto\AbstractData;
use bss-php\dto\Exceptions\InvalidDataException;
use bss-php\dto\Tests\Support\Classes\TestAbstractClass;
use bss-php\dto\Tests\Support\Classes\TestClass;
use bss-php\dto\Tests\Support\Classes\TestClassExtendsAbstractClass;
use bss-php\dto\Tests\Support\Classes\TestClassImplementsInterface;
use bss-php\dto\Tests\Support\Classes\TestClassImplementsInterfaceExtends;
use bss-php\dto\Tests\Support\Classes\TestClassOther;
use bss-php\dto\Tests\Support\Classes\TestInterface;

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
