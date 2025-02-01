<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter;

use Closure;
use Ghostwriter\CaseConverter\Exception\FailedToSplitStringException;
use Ghostwriter\CaseConverter\Interface\CaseConverterInterface;
use Override;

use const MB_CASE_LOWER;
use const MB_CASE_TITLE;
use const MB_CASE_UPPER;
use const PREG_SPLIT_DELIM_CAPTURE;
use const PREG_SPLIT_NO_EMPTY;

use function array_map;
use function implode;
use function lcfirst;
use function mb_convert_case;
use function preg_match;
use function preg_split;
use function str_contains;
use function ucfirst;

final readonly class CaseConverter implements CaseConverterInterface
{
    /**
     * @var Closure(string):string
     */
    private Closure $lower;

    /**
     * @var Closure(string):string
     */
    private Closure $title;

    /**
     * @var Closure(string):string
     */
    private Closure $upper;

    public function __construct()
    {
        $this->upper = static fn (string $word): string => mb_convert_case($word, MB_CASE_UPPER, 'UTF-8');
        $this->lower = static fn (string $word): string => mb_convert_case($word, MB_CASE_LOWER, 'UTF-8');
        $this->title = static fn (string $word): string => mb_convert_case($word, MB_CASE_TITLE, 'UTF-8');
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * eg. The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function adaCase(string $string): string
    {
        return $this->glueUnderscore($this->split($string), $this->title);
    }

    /**
     * eg. theQuickBrownFoxJumpsOverTheLazyDog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function camelCase(string $string): string
    {
        return lcfirst($this->glueUppercase($this->split($string), $this->title));
    }

    /**
     * eg. THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function cobolCase(string $string): string
    {
        return $this->glueDash($this->split($string), $this->upper);
    }

    /**
     * eg. the.quick.brown.fox.jumps.over.the.lazy.dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function dotCase(string $string): string
    {
        return $this->glueDot($this->split($string), $this->lower);
    }

    /**
     * eg. the-quick-brown-fox-jumps-over-the-lazy-dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function kebabCase(string $string): string
    {
        return $this->glueDash($this->split($string), $this->lower);
    }

    /**
     * eg. the quick brown fox jumps over the lazy dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function lowerCase(string $string): string
    {
        return $this->glueSpace($this->split($string), $this->lower);
    }

    /**
     * eg. THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function macroCase(string $string): string
    {
        return $this->glueUnderscore($this->split($string), $this->upper);
    }

    /**
     * eg. TheQuickBrownFoxJumpsOverTheLazyDog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function pascalCase(string $string): string
    {
        return $this->glueUppercase($this->split($string), $this->title);
    }

    /**
     * eg. The quick brown fox jumps over the lazy dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function sentenceCase(string $string): string
    {
        return ucfirst($this->glueSpace($this->split($string), $this->lower));
    }

    /**
     * eg. the_quick_brown_fox_jumps_over_the_lazy_dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function snakeCase(string $string): string
    {
        return $this->glueUnderscore($this->split($string), $this->lower);
    }

    /**
     * eg. The Quick Brown Fox Jumps Over The Lazy Dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function titleCase(string $string): string
    {
        return $this->glueSpace($this->split($string), $this->title);
    }

    /**
     * eg. The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function trainCase(string $string): string
    {
        return $this->glueDash($this->split($string), $this->title);
    }

    /**
     * eg. THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG.
     *
     * @throws FailedToSplitStringException
     */
    #[Override]
    public function upperCase(string $string): string
    {
        return $this->glueSpace($this->split($string), $this->upper);
    }

    /**
     * @param list<string>           $words
     * @param Closure(string):string $converter
     */
    private function glueDash(array $words, Closure $converter): string
    {
        return implode('-', $this->map($converter, $words));
    }

    /**
     * @param list<string>           $words
     * @param Closure(string):string $converter
     */
    private function glueDot(array $words, Closure $converter): string
    {
        return implode('.', $this->map($converter, $words));
    }

    /**
     * @param list<string>           $words
     * @param Closure(string):string $converter
     */
    private function glueSpace(array $words, Closure $converter): string
    {
        return implode(' ', $this->map($converter, $words));
    }

    /**
     * @param list<string>           $words
     * @param Closure(string):string $converter
     */
    private function glueUnderscore(array $words, Closure $converter): string
    {
        return implode('_', $this->map($converter, $words));
    }

    /**
     * @param list<string>           $words
     * @param Closure(string):string $converter
     */
    private function glueUppercase(array $words, Closure $converter): string
    {
        return implode('', $this->map($converter, $words));
    }

    private function isUppercaseWord(string $string): bool
    {
        return preg_match('#^\p{Lu}+$#u', $string) === 1;
    }

    /**
     * @param Closure(string):string $converter
     * @param list<string>           $words
     *
     * @return list<string>
     */
    private function map(Closure $converter, array $words): array
    {
        /**
         * @var Closure(string):string $converter
         * @var list<string>           $words
         *
         * @return list<string>
         */
        return array_map($converter, $words);
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function split(string $string): array
    {
        return match (true) {
            str_contains($string, '_') => $this->splitUnderscore($string),
            str_contains($string, '-') => $this->splitDash($string),
            str_contains($string, ' ') => $this->splitSpace($string),
            str_contains($string, '.') => $this->splitDot($string),
            $this->isUppercaseWord($string) => $this->splitUnderscore($string),
            default => $this->splitUppercase($string),
        };
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function splitDash(string $string): array
    {
        return $this->words($string, '#-+#u');
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function splitDot(string $string): array
    {
        return $this->words($string, '#\\.+#u');
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function splitSpace(string $string): array
    {
        return $this->words($string, '# +#u');
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function splitUnderscore(string $string): array
    {
        return $this->words($string, '#_+#u');
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function splitUppercase(string $string): array
    {
        return $this->words($string, '#(?=\p{Lu})#u');
    }

    /**
     * @throws FailedToSplitStringException
     *
     * @return list<string>
     */
    private function words(string $string, string $pattern): array
    {
        /**
         * @var non-empty-string $pattern
         * @var non-empty-string $string
         */
        $words = preg_split($pattern, $string, 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        if (false === $words) {
            throw new FailedToSplitStringException($string . ' | ' . $pattern);
        }

        /** @return list<string> */
        return $words;
    }
}
