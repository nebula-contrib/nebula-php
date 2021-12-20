## Nebula-PHP

![CI](https://github.com/heyanlong/nebula-php/workflows/E2E/badge.svg)
![release](https://img.shields.io/github/release/heyanlong/nebula-php.svg)
![PHP](https://img.shields.io/badge/PHP-%3E%3D%207.0-brightgreen.svg)
![contributors](https://img.shields.io/github/contributors/heyanlong/nebula-php.svg)
![platform](https://img.shields.io/badge/platform-macos%20%7C%20linux-brightgreen.svg)
![license](https://img.shields.io/badge/license-Apache%202.0-green.svg)
![issues](https://img.shields.io/github/issues/heyanlong/nebula-php.svg)

Nebula PHP client.

## Install with Composer

[https://packagist.org/packages/vesoft-inc/nebula-php](https://packagist.org/packages/vesoft-inc/nebula-php)
```shell
composer require vesoft-inc/nebula-php
```

## Quick Start

```php
<?php
require 'vendor/autoload.php';

$client = new Nebula\GraphClient("127.0.0.1", 9669);

$client->authenticate("root", "1212");

$create = "CREATE SPACE IF NOT EXISTS test(vid_type=FIXED_STRING(30));";
$create .= "USE test;";
$create .= "CREATE TAG IF NOT EXISTS person(name string, age int);";
$create .= "CREATE EDGE like (likeness double);";
$client->execute($create);

sleep(10);

$client->execute('INSERT VERTEX person(name, age) VALUES "Bob":("Bob", 10), "Lily":("Lily", 9)');
$client->execute('INSERT EDGE like(likeness) VALUES "Bob"->"Lily":(80.0);');
$client->execute('FETCH PROP ON person "Bob" YIELD vertex as node');
$client->execute('FETCH PROP ON like "Bob"->"Lily" YIELD edge as e');
$client->execute('DROP SPACE test');
```

## License

Nebula PHP is under Apache2.0 license.
