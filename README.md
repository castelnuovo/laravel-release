<p align="center">
  <img src="https://assets.castelnuovo.dev/logo.svg" width="100" />
</p>

<h1 align="center">
  castelnuovo/laravel-release
</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/castelnuovo/laravel-release.svg?style=flat-square)](https://packagist.org/packages/castelnuovo/laravel-release)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/castelnuovo/laravel-release/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/castelnuovo/laravel-release/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/castelnuovo/laravel-release/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/castelnuovo/laravel-release/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/castelnuovo/laravel-release.svg?style=flat-square)](https://packagist.org/packages/castelnuovo/laravel-release)

Parse data from the changelog API

## Installation

You can install the package via composer:

```bash
composer require castelnuovo/laravel-release
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-release-config"
```

This is the contents of the published config file:

```php
return [
    'api' => '',
    'repository' => '',
];
```

## Usage

```php
$releaseService = new ReleaseService();
$currentRelease = $releaseService->getCurrent();

var_dump($currentRelease);
```

```php
$releaseService = new ReleaseService();
$allReleases = $releaseService->getAll();

var_dump($allReleases);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Luca Castelnuovo](https://github.com/lucacastelnuovo)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
