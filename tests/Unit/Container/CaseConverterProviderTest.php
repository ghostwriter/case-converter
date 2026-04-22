<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Container\CaseConverterProvider;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\Service\ProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CaseConverter::class)]
#[CoversClass(CaseConverterFactory::class)]
#[CoversClass(CaseConverterProvider::class)]
final class CaseConverterProviderTest extends AbstractTestCase
{
    public function testCaseConverterProvider(): void
    {
        $container = $this->createMock(\Ghostwriter\Container\Interface\ContainerInterface::class);

        $container->expects(self::once())
            ->method('alias')
            ->with(CaseConverterInterface::class, CaseConverter::class);

        $container->expects(self::once())
            ->method('factory')
            ->with(CaseConverter::class, CaseConverterFactory::class)
            ->seal();

        $caseConverterProvider = new CaseConverterProvider();

        $caseConverterProvider->register($container);
    }

    public function testImplementsProviderInterface(): void
    {
        self::assertInstanceOf(ProviderInterface::class, new CaseConverterProvider());
    }
}
