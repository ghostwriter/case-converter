<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Interface;

interface CaseConverterInterface
{
    public function adaCase(string $string): string;

    public function camelCase(string $string): string;

    public function cobolCase(string $string): string;

    public function dotCase(string $string): string;

    public function kebabCase(string $string): string;

    public function lowerCase(string $string): string;

    public function macroCase(string $string): string;

    public function pascalCase(string $string): string;

    public function sentenceCase(string $string): string;

    public function snakeCase(string $string): string;

    public function titleCase(string $string): string;

    public function trainCase(string $string): string;

    public function upperCase(string $string): string;
}
