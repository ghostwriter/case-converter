# CaseConverter

[![Compliance](https://github.com/ghostwriter/case-converter/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/case-converter/actions/workflows/automation.yml)
[![Supported PHP Version](https://badgen.net/packagist/php/ghostwriter/case-converter?color=8892bf)](https://www.php.net/supported-versions)
[![GitHub Sponsors](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/case-converter&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)
[![Code Coverage](https://codecov.io/gh/ghostwriter/case-converter/branch/main/graph/badge.svg)](https://codecov.io/gh/ghostwriter/case-converter)
[![Latest Version on Packagist](https://badgen.net/packagist/v/ghostwriter/case-converter)](https://packagist.org/packages/ghostwriter/case-converter)
[![Downloads](https://badgen.net/packagist/dt/ghostwriter/case-converter?color=blue)](https://packagist.org/packages/ghostwriter/case-converter)

Convert strings from and to `AdaCase`, `CamelCase`, `CobolCase`, `KebabCase`, `Lowercase`, `MacroCase`, `PascalCase`, `SentenceCase`, `SnakeCase`, `TitleCase`, `TrainCase`, and `Uppercase`.

## Installation

You can install the package via composer:

``` bash
composer require ghostwriter/case-converter
```

### Star ⭐️ this repo if you find it useful

You can also star (🌟) this repo to find it easier later.

## Usage

```php
use GhostWriter\CaseConverter\CaseConverter;

$string = 'The quick brown fox jumps over the lazy dog';

// $caseConverter = new CaseConverter();
// or
$caseConverter = CaseConverter::new();

$caseConverter->adaCase($string); // The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog

$caseConverter->camelCase($string); // theQuickBrownFoxJumpsOverTheLazyDog

$caseConverter->cobolCase($string); // THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG

$caseConverter->dotCase($string); // the.quick.brown.fox.jumps.over.the.lazy.dog

$caseConverter->kebabCase($string); // the-quick-brown-fox-jumps-over-the-lazy-dog

$caseConverter->lowerCase($string); // the quick brown fox jumps over the lazy dog

$caseConverter->macroCase($string); // THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG

$caseConverter->pascalCase($string); // TheQuickBrownFoxJumpsOverTheLazyDog

$caseConverter->sentenceCase($string); // The quick brown fox jumps over the lazy dog

$caseConverter->snakeCase($string); // the_quick_brown_fox_jumps_over_the_lazy_dog

$caseConverter->titleCase($string); // The Quick Brown Fox Jumps Over The Lazy Dog

$caseConverter->trainCase($string); // The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog

$caseConverter->upperCase($string); // THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG
```

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [All Contributors](https://github.com/ghostwriter/case-converter/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
