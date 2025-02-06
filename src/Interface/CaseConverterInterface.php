<?php

declare(strict_types=1);

namespace Ghostwriter\CaseConverter\Interface;

interface CaseConverterInterface
{
    public function toAdaCase(string $string): string;

    public function toCamelCase(string $string): string;

    public function toCobolCase(string $string): string;

    public function toDotCase(string $string): string;

    public function toKebabCase(string $string): string;

    public function toLowerCase(string $string): string;

    public function toMacroCase(string $string): string;

    public function toPascalCase(string $string): string;

    public function toSentenceCase(string $string): string;

    public function toSnakeCase(string $string): string;

    public function toTitleCase(string $string): string;

    public function toTrainCase(string $string): string;

    public function toUpperCase(string $string): string;
}
