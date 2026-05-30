# Case Converter

[![Automation](https://github.com/ghostwriter/case-converter/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/case-converter/actions/workflows/automation.yml)
[![PHP Version](https://badgen.net/packagist/php/ghostwriter/case-converter?color=777BB4)](https://www.php.net/supported-versions)
[![Packagist Downloads](https://badgen.net/packagist/dt/ghostwriter/case-converter?color=F28D1A)](https://packagist.org/packages/ghostwriter/case-converter)
[![PayPal](https://img.shields.io/badge/paypal-@codepoet-0079C1?logo=paypal&logoColor=002991)](https://paypal.me/codepoet)
[![Sponsors via GitHub](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/case-converter&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)

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

$string = 'The quick, brown fox jumps over the lazy dog.';

// $caseConverter = new CaseConverter();
// or
$caseConverter = CaseConverter::new();

// The_Quick_Brown_Fox_Jumps_Over_The_Lazy_Dog
$caseConverter->toAdaCase($string); 

// theQuickBrownFoxJumpsOverTheLazyDog
$caseConverter->toCamelCase($string);

// THE-QUICK-BROWN-FOX-JUMPS-OVER-THE-LAZY-DOG
$caseConverter->toCobolCase($string);

// the.quick.brown.fox.jumps.over.the.lazy.dog
$caseConverter->toDotCase($string);

// the-quick-brown-fox-jumps-over-the-lazy-dog
$caseConverter->toKebabCase($string);

// the quick brown fox jumps over the lazy dog
$caseConverter->toLowerCase($string);

// THE_QUICK_BROWN_FOX_JUMPS_OVER_THE_LAZY_DOG
$caseConverter->toMacroCase($string);

// TheQuickBrownFoxJumpsOverTheLazyDog
$caseConverter->toPascalCase($string);

// The quick brown fox jumps over the lazy dog
$caseConverter->toSentenceCase($string);

// the_quick_brown_fox_jumps_over_the_lazy_dog
$caseConverter->toSnakeCase($string);

// The Quick Brown Fox Jumps Over The Lazy Dog
$caseConverter->toTitleCase($string);

// The-Quick-Brown-Fox-Jumps-Over-The-Lazy-Dog
$caseConverter->toTrainCase($string);

// THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG
$caseConverter->toUpperCase($string);
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
