<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    public const array EMPTY_INPUTS = ['___', '---', '...', '   '];

    protected const string ADA_CASE = 'The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog';

    protected const string CAMEL_CASE = 'theQuickBrownFoxJumpsOverTheLazyDog';

    protected const array CASES = [
        self::ADA_CASE,
        self::CAMEL_CASE,
        self::COBOL_CASE,
        self::DOT_CASE,
        self::KEBAB_CASE,
        self::LOWER_CASE,
        self::MACRO_CASE,
        self::PASCAL_CASE,
        self::SENTENCE_CASE,
        self::SNAKE_CASE,
        self::TITLE_CASE,
        self::TRAIN_CASE,
        self::UPPER_CASE,
        self::THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG,
    ];

    protected const string COBOL_CASE = 'THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG';

    protected const string DOT_CASE = 'the.quick.brown.fox.jumps.over.the.lazy.dog';

    protected const string KEBAB_CASE = 'the-quick-brown-fox-jumps-over-the-lazy-dog';

    protected const string LOWER_CASE = 'the quick brown fox jumps over the lazy dog';

    protected const string MACRO_CASE = 'THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG';

    protected const string PASCAL_CASE = 'TheQuickBrownFoxJumpsOverTheLazyDog';

    protected const string SENTENCE_CASE = 'The quick brown fox jumps over the lazy dog';

    protected const string SNAKE_CASE = 'the_quick_brown_fox_jumps_over_the_lazy_dog';

    protected const string THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG = 'The! quick, brown# fox _jumps *over the lazy dog.';

    protected const string TITLE_CASE = 'The Quick Brown Fox Jumps Over The Lazy Dog';

    protected const string TO_ADA_METHOD = 'toAdaCase';

    protected const string TO_CAMEL_METHOD = 'toCamelCase';

    protected const string TO_COBOL_METHOD = 'toCobolCase';

    protected const string TO_DOT_METHOD = 'toDotCase';

    protected const string TO_KEBAB_METHOD = 'toKebabCase';

    protected const string TO_LOWER_METHOD = 'toLowerCase';

    protected const string TO_MACRO_METHOD = 'toMacroCase';

    protected const array TO_METHODS = [
        self::TO_ADA_METHOD,
        self::TO_CAMEL_METHOD,
        self::TO_COBOL_METHOD,
        self::TO_DOT_METHOD,
        self::TO_KEBAB_METHOD,
        self::TO_LOWER_METHOD,
        self::TO_MACRO_METHOD,
        self::TO_PASCAL_METHOD,
        self::TO_SENTENCE_METHOD,
        self::TO_SNAKE_METHOD,
        self::TO_TITLE_METHOD,
        self::TO_TRAIN_METHOD,
        self::TO_UPPER_METHOD,
    ];

    protected const string TO_PASCAL_METHOD = 'toPascalCase';

    protected const string TO_SENTENCE_METHOD = 'toSentenceCase';

    protected const string TO_SNAKE_METHOD = 'toSnakeCase';

    protected const string TO_TITLE_METHOD = 'toTitleCase';

    protected const string TO_TRAIN_METHOD = 'toTrainCase';

    protected const string TO_UPPER_METHOD = 'toUpperCase';

    protected const string TRAIN_CASE = 'The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog';

    protected const string UPPER_CASE = 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG';

    protected CaseConverter $caseConverter;

    protected ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = Container::getInstance();
        $this->caseConverter = $this->container->get(CaseConverterInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->container->reset(); // Clear the container to avoid side effects between tests
    }
}
