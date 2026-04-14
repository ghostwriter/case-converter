<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Override;
use Throwable;

/**
 * @see CaseConverterProviderTest
 */
final class CaseConverterProvider extends AbstractProvider
{
    /** @throws Throwable */
    #[Override]
    public function register(BuilderInterface $builder): void
    {
        $builder->alias(CaseConverterInterface::class, CaseConverter::class);
        $builder->factory(CaseConverter::class, CaseConverterFactory::class);
    }
}
