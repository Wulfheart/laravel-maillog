# A maillog for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wulfheart/laravel-maillog.svg?style=flat-square)](https://packagist.org/packages/wulfheart/laravel-maillog)
[![Total Downloads](https://img.shields.io/packagist/dt/wulfheart/laravel-maillog.svg?style=flat-square)](https://packagist.org/packages/wulfheart/laravel-maillog)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require wulfheart/laravel-maillog
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-maillog-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-maillog-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-maillog-views"
```

## Usage

```php
$maillog = new Wulfheart\Maillog();
echo $maillog->echoPhrase('Hello, Wulfheart!');
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

- [Alexander Wulf](https://github.com/Wulfheart)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
