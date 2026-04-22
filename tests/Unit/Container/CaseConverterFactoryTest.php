<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Container\CaseConverterProvider;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use ReflectionClass;
use Tests\Unit\AbstractTestCase;

use Throwable;

#[CoversClass(CaseConverter::class)]
#[CoversClass(CaseConverterFactory::class)]
#[CoversClass(CaseConverterProvider::class)]
final class CaseConverterFactoryTest extends AbstractTestCase
{
    public function testFactoryIsFinal(): void
    {
        $factory = new CaseConverterFactory();
        $reflection = new ReflectionClass($factory);
        self::assertTrue($reflection->isFinal());
    }

    public function testFactoryIsReadonly(): void
    {
        $factory = new CaseConverterFactory();
        $reflection = new ReflectionClass($factory);
        self::assertTrue($reflection->isReadOnly());
    }

    public function testImplementsFactoryInterface(): void
    {
        self::assertInstanceOf(FactoryInterface::class, new CaseConverterFactory());
    }

    public function testInvoke(): void
    {
        self::assertIsCallable(new CaseConverterFactory());
    }

    public function testInvokeReturnsInstanceOfCaseConverter(): void
    {
        $factory = new CaseConverterFactory();

        $caseConverter = $factory($this->container);

        self::assertInstanceOf(CaseConverterInterface::class, $caseConverter);
        self::assertInstanceOf(CaseConverter::class, $caseConverter);
    }

    /** @throws Throwable */
    public function testMultipleInvocationsReturnNewInstances(): void
    {
        $factory = new CaseConverterFactory();

        $instance1 = $factory($this->container);
        self::assertInstanceOf(CaseConverter::class, $instance1);

        $instance2 = $factory($this->container);
        self::assertInstanceOf(CaseConverter::class, $instance2);

        self::assertNotSame($instance1, $instance2);
    }
}
