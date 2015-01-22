Gacha-Gacha
====

## Description

Gacha-Gacha is an implementation of weighted randomization in PHP.
Gacha-Gacha requires PHP >= 5.3.3.

## Usage

```php

$gachagacha = new GachaGacha();

$gachagacha->set('Marks',    30.124);
$gachagacha->set('Daniel',   20);
$gachagacha->set('Schuster', 0);

$gachagacha->pick();        // single item
$gachagacha->pick(1000);    // array of items

```

## Install




## Licence

[MIT]

## Author

[onody](https://github.com/onody)