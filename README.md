# symfony-asset-strategy-last-modify
Strategy for symfony assets component

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/0251b6c1-4d02-4510-a6b7-bb2338ccfca1/big.png)](https://insight.sensiolabs.com/projects/0251b6c1-4d02-4510-a6b7-bb2338ccfca1)

[![Build Status](https://travis-ci.org/alexpts/symfony-asset-strategy-last-modify.svg?branch=master)](https://travis-ci.org/alexpts/symfony-asset-strategy-last-modify)
[![Test Coverage](https://codeclimate.com/github/alexpts/symfony-asset-strategy-last-modify/badges/coverage.svg)](https://codeclimate.com/github/alexpts/symfony-asset-strategy-last-modify/coverage)
[![Code Climate](https://codeclimate.com/github/alexpts/symfony-asset-strategy-last-modify/badges/gpa.svg)](https://codeclimate.com/github/alexpts/symfony-asset-strategy-last-modify)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alexpts/symfony-asset-strategy-last-modify/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alexpts/symfony-asset-strategy-last-modify/?branch=master)


Стратегия для получения версии ресурса из времени последнего изменения файла

## Installation

```$ composer require alexpts/symfony-asset-strategy-last-modify```


### Demo
```php
$package = new Package(new LastModifyStrategy($assertDirPath));
$url = $package->getUrl('/jquery.js'); // /jquery.js?v=1472155706
```
