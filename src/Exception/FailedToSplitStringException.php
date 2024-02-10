<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Exception;

use Ghostwriter\CaseConverter\Interface\Exception\CaseConverterExceptionInterface;
use RuntimeException;

final class FailedToSplitStringException extends RuntimeException implements CaseConverterExceptionInterface
{
}
