<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Container\CaseConverterProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;

#[CoversClass(CaseConverter::class)]
#[UsesClass(CaseConverterFactory::class)]
#[UsesClass(CaseConverterProvider::class)]
final class CaseConverterTest extends AbstractTestCase
{
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
