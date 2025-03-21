<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Override;
use Throwable;

final readonly class CaseConverterServiceProvider implements ServiceProviderInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        $container->alias(CaseConverter::class, CaseConverterInterface::class);
        $container->define(CaseConverter::class, static fn (): CaseConverter => CaseConverter::new());
    }
}
