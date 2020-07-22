# Kave Negar Sms Provider

[![GitHub Workflow Status](https://github.com/meysamzandy/KaveNegarSmsProvider/workflows/Run%20tests/badge.svg)](https://github.com/meysamzandy/KaveNegarSmsProvider/actions)
[![styleci](https://styleci.io/repos/281369503/shield)](https://styleci.io/repos/281369503)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/meysamzandy/KaveNegarSmsProvider/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/meysamzandy/KaveNegarSmsProvider/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/meysamzandy/KaveNegarSmsProvider/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/meysamzandy/KaveNegarSmsProvider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/meysamzandy/KaveNegarSmsProvider/build-status/master)

[![Packagist](https://img.shields.io/packagist/php-v/meysam-znd/kave-negar-sms-provider.svg)](https://packagist.org/packages/meysam-znd/kave-negar-sms-provider)
[![Packagist](https://img.shields.io/packagist/v/meysam-znd/kave-negar-sms-provider.svg)](https://packagist.org/packages/meysam-znd/kave-negar-sms-provider)
[![Packagist](https://poser.pugx.org/meysam-znd/kave-negar-sms-provider/d/total.svg)](https://packagist.org/packages/meysam-znd/kave-negar-sms-provider)
[![Packagist](https://img.shields.io/packagist/l/meysam-znd/kave-negar-sms-provider.svg)](https://packagist.org/packages/meysam-znd/kave-negar-sms-provider)

Package description: KaveNegar SMS sender package for laravel

## Installation

Install via composer
```bash
composer require meysam-znd/kave-negar-sms-provider
```

### Publish package assets

```bash
php artisan vendor:publish --provider="MeysamZnd\KaveNegarSmsProvider\ServiceProvider"
```

## Usage

```bash
use MeysamZnd\KaveNegarSmsProvider\KaveNegarSmsProvider;
use MeysamZnd\KaveNegarSmsProvider\ToOne;
use MeysamZnd\KaveNegarSmsProvider\ToMany;
use MeysamZnd\KaveNegarSmsProvider\Validation;
use MeysamZnd\KaveNegarSmsProvider\CallMessage;

```

### Send sms to one number.
```bash
$akiKey = 'your api key in kavenegar';

$data = [
        'receptor' => 'receiver numbers',
        'sender' => 'sender number',
        'message' => 'your text message',
        'date' => 'send time in UnixTime',
    ];
$sender = new KaveNegarSmsProvider(new ToOne());

// send and get the result
dd ( $sender->send($akiKey, $data) );

```
### Send sms to many numbers with schedule.
##### for sending sms to few numbers, separate those numbers with ", " as a string.

```bash

$akiKey = 'your api key in kavenegar';

$data = [
        'receptor' => 'receiver numbers',
        'sender' => 'sender number',
        'message' => 'your text message',
        'date' => 'send time in UnixTime',
    ];
$sender = new KaveNegarSmsProvider(new ToMany());

// send and get the result
dd ( $sender->send($akiKey, $data) );

```

### Send validation SMS.

```bash
$akiKey = 'your api key in kavenegar';

$data = [
        'receptor' => 'receiver numbers', // string
        'token' => 'your validation code',
        'template' => 'your verify template name', // string
    ];
$sender = new KaveNegarSmsProvider(new Validation());

// send and get the result
dd ( $sender->send($akiKey, $data) );

```

### Send voice SMS via call.

```bash

$akiKey = 'your api key in kavenegar';

$data = [
        'receptor' => 'receiver numbers', // string
        'message' => 'your text message to call', // string
        'repeat' => 1, //Repeat the message.
    ];
$sender = new KaveNegarSmsProvider(new CallMessage());

// send and get the result
dd ( $sender->send($akiKey, $data) );

```
## Security

If you discover any security related issues, please email
instead of using the issue tracker.

## Credits

- [Meysam Zandy](https://github.com/meysamzandy/KaveNegarSmsProvider)
- [All contributors](https://github.com/meysamzandy/KaveNegarSmsProvider/graphs/contributors)

