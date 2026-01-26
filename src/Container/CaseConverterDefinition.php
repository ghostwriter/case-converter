<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Override;
use Throwable;

/**
 * @see CaseConverterDefinitionTest
 */
final readonly class CaseConverterDefinition implements DefinitionInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        $container->alias(CaseConverter::class, CaseConverterInterface::class);
        $container->factory(CaseConverter::class, CaseConverterFactory::class);
    }
}
