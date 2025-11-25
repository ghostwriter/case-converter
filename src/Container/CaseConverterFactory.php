<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Override;
use Throwable;

/**
 * @see CaseConverterFactoryTest
 *
 * @implements FactoryInterface<CaseConverter>
 */
final readonly class CaseConverterFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): CaseConverter
    {
        return CaseConverter::new();
    }
}
