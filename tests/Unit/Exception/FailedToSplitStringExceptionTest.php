<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Container\CaseConverterProvider;
use Ghostwriter\CaseConverter\Exception\FailedToSplitStringException;
use Ghostwriter\CaseConverter\Interface\Exception\CaseConverterExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(FailedToSplitStringException::class)]
#[CoversClass(CaseConverter::class)]
#[CoversClass(CaseConverterFactory::class)]
#[CoversClass(CaseConverterProvider::class)]
final class FailedToSplitStringExceptionTest extends AbstractTestCase
{
    public function testInstanceOfCaseConverterExceptionInterface(): void
    {
        $exception = new FailedToSplitStringException();
        self::assertInstanceOf(CaseConverterExceptionInterface::class, $exception);
    }

    public function testInstanceOfThrowable(): void
    {
        $exception = new FailedToSplitStringException();
        self::assertInstanceOf(Throwable::class, $exception);
    }
}
