<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Container;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;

/**
 * @see CaseConverterProviderTest
 */
final class CaseConverterProvider extends AbstractProvider
{
    /**
     * alias => service.
     *
     * @var array<class-string,class-string>
     */
    public const array ALIAS = [
        CaseConverterInterface::class => CaseConverter::class,
    ];

    /**
     * service => factory.
     *
     * @var array<class-string,class-string<FactoryInterface>>
     */
    public const array FACTORY = [
        CaseConverter::class => CaseConverterFactory::class,
    ];
}
