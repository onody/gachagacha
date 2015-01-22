Gacha-Gacha
====

[![Build Status](https://travis-ci.org/onody/gachagacha.svg?branch=master)](https://travis-ci.org/onody/gachagacha)
[![Coverage Status](https://coveralls.io/repos/onody/gachagacha/badge.svg)](https://coveralls.io/r/onody/gachagacha)

## Description

Gacha-Gacha is an implementation of weighted randomization in PHP.  
Gacha-Gacha requires PHP >= 5.3.3.

## Usage

```php
require_once './vendor/onody/gachagacha/src/autoload.php';

$gachagacha = new \GachaGacha\Picker();

$gachagacha->set('Marks',    30.124);
$gachagacha->set('Daniel',   20);
$gachagacha->set('Schuster', 0);

$gachagacha->pick();        // single item
$gachagacha->pick(1000);    // array of items
```

## Install

```json:composer.json
{   
    "require": {
        "onody/gachagacha": "1.0.0"
    }
}
```

```bash
php composer.phar install
```


## Licence

[MIT]

## Author

[onody](https://github.com/onody)