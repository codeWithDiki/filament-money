# Filament Simplified Money Input

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codewithdiki/filament-money.svg?style=flat-square)](https://packagist.org/packages/codewithdiki/filament-money)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/codewithdiki/filament-money/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/codewithdiki/filament-money/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/codewithdiki/filament-money/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/codewithdiki/filament-money/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/codewithdiki/filament-money.svg?style=flat-square)](https://packagist.org/packages/codewithdiki/filament-money)

## Installation

You can install the package via composer:

```bash
composer require codewithdiki/filament-money
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-money-config"
```

This is the contents of the published config file:

```php
return [
    'currency' => 'IDR',
    'decimal_places' => 2
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-money-views"
```

## Usage

```php
use CodeWithDiki\FilamentMoney\Forms\Components\Money;

Money::make("price")
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Diki Akbar Asyidiq](https://github.com/codeWithDiki)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
