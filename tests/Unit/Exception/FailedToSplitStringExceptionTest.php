<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverterTests\Unit\Exception;

use Ghostwriter\CaseConverter\Exception\FailedToSplitStringException;
use Ghostwriter\CaseConverter\Interface\Exception\CaseConverterExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FailedToSplitStringException::class)]
final class FailedToSplitStringExceptionTest extends TestCase
{
    public function testInstanceOfCaseConverterExceptionInterface(): void
    {
        self::assertInstanceOf(CaseConverterExceptionInterface::class, new FailedToSplitStringException());
    }
}
