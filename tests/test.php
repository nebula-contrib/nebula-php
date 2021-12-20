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


var_dump($client);
