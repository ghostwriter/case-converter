<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterDefinition;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Ghostwriter\Container\Container;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CaseConverter::class)]
#[UsesClass(CaseConverterDefinition::class)]
#[UsesClass(CaseConverterFactory::class)]
final class CaseConverterTest extends TestCase
{
    private const string ADA_CASE = 'The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog';

    private const string CAMEL_CASE = 'theQuickBrownFoxJumpsOverTheLazyDog';

    private const array CASES = [
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

    private const string COBOL_CASE = 'THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG';

    private const string DOT_CASE = 'the.quick.brown.fox.jumps.over.the.lazy.dog';

    private const string KEBAB_CASE = 'the-quick-brown-fox-jumps-over-the-lazy-dog';

    private const string LOWER_CASE = 'the quick brown fox jumps over the lazy dog';

    private const string MACRO_CASE = 'THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG';

    private const string PASCAL_CASE = 'TheQuickBrownFoxJumpsOverTheLazyDog';

    private const string SENTENCE_CASE = 'The quick brown fox jumps over the lazy dog';

    private const string SNAKE_CASE = 'the_quick_brown_fox_jumps_over_the_lazy_dog';

    private const string THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG = 'The! quick, brown# fox _jumps *over the lazy dog.';

    private const string TITLE_CASE = 'The Quick Brown Fox Jumps Over The Lazy Dog';

    private const string TRAIN_CASE = 'The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog';

    private const string UPPER_CASE = 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG';

    private CaseConverter $caseConverter;

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

    #[DataProvider('dataProviderFrom')]
    public function testToAdaCase(string $string): void
    {
        self::assertSame(self::ADA_CASE, $this->caseConverter->toAdaCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToCamelCase(string $string): void
    {
        self::assertSame(self::CAMEL_CASE, $this->caseConverter->toCamelCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToCobolCase(string $string): void
    {
        self::assertSame(self::COBOL_CASE, $this->caseConverter->toCobolCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToDotCase(string $string): void
    {
        self::assertSame(self::DOT_CASE, $this->caseConverter->toDotCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToKebabCase(string $string): void
    {
        self::assertSame(self::KEBAB_CASE, $this->caseConverter->toKebabCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToLowerCase(string $string): void
    {
        self::assertSame(self::LOWER_CASE, $this->caseConverter->toLowerCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToMacroCase(string $string): void
    {
        self::assertSame(self::MACRO_CASE, $this->caseConverter->toMacroCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToPascalCase(string $string): void
    {
        self::assertSame(self::PASCAL_CASE, $this->caseConverter->toPascalCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToSentenceCase(string $string): void
    {
        self::assertSame(self::SENTENCE_CASE, $this->caseConverter->toSentenceCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToSnakeCase(string $string): void
    {
        self::assertSame(self::SNAKE_CASE, $this->caseConverter->toSnakeCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToTitleCase(string $string): void
    {
        self::assertSame(self::TITLE_CASE, $this->caseConverter->toTitleCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToTrainCase(string $string): void
    {
        self::assertSame(self::TRAIN_CASE, $this->caseConverter->toTrainCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToUpperCase(string $string): void
    {
        self::assertSame(self::UPPER_CASE, $this->caseConverter->toUpperCase($string));
    }

    public static function dataProviderFrom(): iterable
    {
        foreach (self::CASES as $case) {
            yield 'From ' . $case => [$case];
        }
    }
}
