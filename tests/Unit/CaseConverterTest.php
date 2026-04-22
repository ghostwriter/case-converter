<?php

declare(strict_types=1);

namespace Tests\Unit;

use Generator;
use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\CaseConverter\Container\CaseConverterFactory;
use Ghostwriter\CaseConverter\Container\CaseConverterProvider;
use LogicException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

use function hash;
use function sprintf;

#[CoversClass(CaseConverter::class)]
#[CoversClass(CaseConverterFactory::class)]
#[CoversClass(CaseConverterProvider::class)]
final class CaseConverterTest extends AbstractTestCase
{
    #[DataProvider('dataProviderEmptyInputs')]
    #[DataProvider('dataProviderMatrix')]
    #[DataProvider('dataProviderSingleWordConversions')]
    #[DataProvider('dataProviderSingleWordUppercaseConversions')]
    public function testMatrix(string $input, string $method, string $expected): void
    {
        self::assertSame($expected, $this->caseConverter->{$method}($input));
    }

    public function testStaticNewMethod(): void
    {
        self::assertInstanceOf(CaseConverter::class, CaseConverter::new());
    }

    /** @return Generator<string, array{string, string, string}> */
    public static function dataProviderEmptyInputs(): iterable
    {
        foreach (self::EMPTY_INPUTS as $input) {
            foreach (self::TO_METHODS as $method) {
                yield sprintf('%s-with-%s', $method, hash('crc32', $input)) => [$input, $method, ''];
            }
        }
    }

    /** @return Generator<string, array{string, string, string}> */
    public static function dataProviderMatrix(): iterable
    {
        foreach (self::CASES as $input) {
            foreach (self::TO_METHODS as $method) {
                $expected = match ($method) {
                    self::TO_ADA_METHOD => self::ADA_CASE,
                    self::TO_CAMEL_METHOD => self::CAMEL_CASE,
                    self::TO_COBOL_METHOD => self::COBOL_CASE,
                    self::TO_DOT_METHOD => self::DOT_CASE,
                    self::TO_KEBAB_METHOD => self::KEBAB_CASE,
                    self::TO_LOWER_METHOD => self::LOWER_CASE,
                    self::TO_MACRO_METHOD => self::MACRO_CASE,
                    self::TO_PASCAL_METHOD => self::PASCAL_CASE,
                    self::TO_SENTENCE_METHOD => self::SENTENCE_CASE,
                    self::TO_SNAKE_METHOD => self::SNAKE_CASE,
                    self::TO_TITLE_METHOD => self::TITLE_CASE,
                    self::TO_TRAIN_METHOD => self::TRAIN_CASE,
                    self::TO_UPPER_METHOD => self::UPPER_CASE,
                    default => throw new LogicException('Unknown method: ' . $method)
                };

                yield sprintf('From "%s" ->%s "%s"', $input, $method, $expected) => [$input, $method, $expected];
            }
        }
    }

    /** @return Generator<string, array{string, string, string}> */
    public static function dataProviderSingleWordConversions(): iterable
    {
        // Single word conversions
        $input = 'hello';

        foreach (self::TO_METHODS as $method) {
            $expected = match ($method) {
                self::TO_ADA_METHOD, self::TO_TRAIN_METHOD, self::TO_TITLE_METHOD, self::TO_SENTENCE_METHOD, self::TO_PASCAL_METHOD => 'Hello',
                self::TO_CAMEL_METHOD, self::TO_SNAKE_METHOD, self::TO_LOWER_METHOD, self::TO_KEBAB_METHOD, self::TO_DOT_METHOD => 'hello',
                self::TO_COBOL_METHOD, self::TO_UPPER_METHOD, self::TO_MACRO_METHOD => 'HELLO',
                default => throw new LogicException('Unknown method: ' . $method)
            };

            yield sprintf('%s-with-%s', $method, hash('crc32', $input)) => [$input, $method, $expected];
        }
    }

    /** @return Generator<string, array{string, string, string}> */
    public static function dataProviderSingleWordUppercaseConversions(): iterable
    {
        $input = 'HELLO';

        foreach (self::TO_METHODS as $method) {
            $expected = match ($method) {
                self::TO_ADA_METHOD, self::TO_TRAIN_METHOD, self::TO_TITLE_METHOD, self::TO_SENTENCE_METHOD, self::TO_PASCAL_METHOD => 'Hello',
                self::TO_CAMEL_METHOD, self::TO_SNAKE_METHOD, self::TO_LOWER_METHOD, self::TO_KEBAB_METHOD, self::TO_DOT_METHOD => 'hello',
                self::TO_COBOL_METHOD, self::TO_UPPER_METHOD, self::TO_MACRO_METHOD => 'HELLO',
                default => throw new LogicException('Unknown method: ' . $method)
            };

            yield sprintf('%s-with-%s', $method, hash('crc32', $input)) => [$input, $method, $expected];
        }
    }
}
