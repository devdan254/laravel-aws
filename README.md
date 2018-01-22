# Laravel AWS

[![Build Status](https://travis-ci.org/oanhnn/laravel-aws.svg?branch=master)](https://travis-ci.org/oanhnn/laravel-aws)
[![Coverage Status](https://coveralls.io/repos/github/oanhnn/laravel-aws/badge.svg?branch=master)](https://coveralls.io/github/oanhnn/laravel-aws?branch=master)
[![Latest Version](https://img.shields.io/github/release/oanhnn/laravel-aws.svg?style=flat-square)](https://github.com/oanhnn/laravel-aws/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Easy working with AWS SDK and SNS service for Your Laravel 5.4+ Application.

<!-- MarkdownTOC depth="2" autolink="true" bracket="round" -->

- [Main features](#main-features)
- [TODO](#todo)
- [Requirements](#requirements)
- [Installation](#installation)
    - [Composer](#composer)
    - [Service Provider and Facade](#service-provider-and-facade)
    - [Config file](#config-file)
    - [Contract and Traits](#contract-and-traits)
- [Usage](#usage)
- [Events](#events)
- [Config File](#config-file)
- [Changelog](#changelog)
- [Testing](#testing)
- [Contributing](#contributing)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

<!-- /MarkdownTOC -->

## Main features

* Integrate AWS SDK to Laravel
* SNS Message handler

## TODO

- [ ] Add unit test scripts
- [ ] Make better document

## Requirements

* php >=7.0
* Laravel 5.4+

## Installation

### Composer

Begin by pulling in the package through Composer.

```bash
$ composer require oanhnn/laravel-aws
```

### Service Provider and Facade

Next, if using Laravel 5.5+, you done. 

If using Laravel 5.4, You must find the `providers` key in your `config/app.php` and register the AWS Service Provider.

```php
// config/app.php

    'providers' => [
        // ...
        Laravel\Aws\AwsServiceProvider::class,
    ],
```

Find the `aliases` key in your `config/app.php` and add the AWS facade alias.

```php
// config/app.php

    'aliases' => array(
        // ...
        'AWS' => Laravel\Aws\Facades\Aws::class,
    )
```

### Config file

Publish package config file with the command:

```bash
$ php artisan vendor:publish --provider="Laravel\Aws\AwsServiceProvider"
```


## Usage


## Events


## Config File


## Changelog

See all change logs in [CHANGELOG](CHANGELOG.md)

## Testing

```bash
$ git clone git@github.com/oanhnn/laravel-aws.git /path
$ cd /path
$ composer install
$ composer phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email to [Oanh Nguyen](mailto:oanhnn.bk@gmail.com) instead of 
using the issue tracker.

## Credits

- [Oanh Nguyen](https://github.com/oanhnn)
- [All Contributors](../../contributors)

## License

This project is released under the MIT License.   
Copyright © 2018 [Oanh Nguyen](https://oanhnn.github.io/).
