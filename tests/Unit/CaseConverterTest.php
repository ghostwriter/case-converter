<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverterTests\Unit;

use Generator;
use Ghostwriter\CaseConverter\CaseConverter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(CaseConverter::class)]
final class CaseConverterTest extends TestCase
{
    public const array CASES = [
        self::ADACASE,
        self::CAMELCASE,
        self::COBOLCASE,
        self::DOTCASE,
        self::KEBABCASE,
        self::LOWERCASE,
        self::MACROCASE,
        self::PASCALCASE,
        self::SENTENCECASE,
        self::SNAKECASE,
        self::TITLECASE,
        self::TRAINCASE,
        self::UPPERCASE,
    ];

    public const string THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG = 'The quick brown fox jumps over the lazy dog';

    public const string ADACASE = 'The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog';

    public const string CAMELCASE = 'theQuickBrownFoxJumpsOverTheLazyDog';

    public const string COBOLCASE = 'THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG';

    public const string DOTCASE = 'the.quick.brown.fox.jumps.over.the.lazy.dog';

    public const string KEBABCASE = 'the-quick-brown-fox-jumps-over-the-lazy-dog';

    public const string LOWERCASE = 'the quick brown fox jumps over the lazy dog';

    public const string MACROCASE = 'THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG';

    public const string PASCALCASE = 'TheQuickBrownFoxJumpsOverTheLazyDog';

    public const string SENTENCECASE = 'The quick brown fox jumps over the lazy dog';

    public const string SNAKECASE = 'the_quick_brown_fox_jumps_over_the_lazy_dog';

    public const string TITLECASE = 'The Quick Brown Fox Jumps Over The Lazy Dog';

    public const string TRAINCASE = 'The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog';

    public const string UPPERCASE = 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG';

    #[DataProvider('dataProviderFrom')]
    public function testToAdaCase(string $string): void
    {
        self::assertSame(self::ADACASE, CaseConverter::new()->adaCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToCamelCase(string $string): void
    {
        self::assertSame(self::CAMELCASE, CaseConverter::new()->camelCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToCobolCase(string $string): void
    {
        self::assertSame(self::COBOLCASE, CaseConverter::new()->cobolCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToDotCase(string $string): void
    {
        self::assertSame(self::DOTCASE, CaseConverter::new()->dotCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToKebabCase(string $string): void
    {
        self::assertSame(self::KEBABCASE, CaseConverter::new()->kebabCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToLowerCase(string $string): void
    {
        self::assertSame(self::LOWERCASE, CaseConverter::new()->lowerCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToMacroCase(string $string): void
    {
        self::assertSame(self::MACROCASE, CaseConverter::new()->macroCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToPascalCase(string $string): void
    {
        self::assertSame(self::PASCALCASE, CaseConverter::new()->pascalCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToSentenceCase(string $string): void
    {
        self::assertSame(self::SENTENCECASE, CaseConverter::new()->sentenceCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToSnakeCase(string $string): void
    {
        self::assertSame(self::SNAKECASE, CaseConverter::new()->snakeCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToTitleCase(string $string): void
    {
        self::assertSame(self::TITLECASE, CaseConverter::new()->titleCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToTrainCase(string $string): void
    {
        self::assertSame(self::TRAINCASE, CaseConverter::new()->trainCase($string));
    }

    #[DataProvider('dataProviderFrom')]
    public function testToUpperCase(string $string): void
    {
        self::assertSame(self::UPPERCASE, CaseConverter::new()->upperCase($string));
    }

    public static function dataProviderFrom(): Generator
    {
        foreach (self::CASES as $case) {
            yield 'From ' . $case => [$case];
        }
    }
}
