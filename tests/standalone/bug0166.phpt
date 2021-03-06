--TEST--
Disable serialization of objects
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; CLEANUP(STANDALONE)?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$str = 'O:22:"MongoDB\Driver\Manager":0:{}';
$v = @unserialize($str);
var_dump($v);

throws(function() {
    $manager = new MongoDB\Driver\Manager("mongodb://localhost");
    serialize($manager);
}, "Exception", "serialize");
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
bool(false)
OK: Got Exception thrown from serialize
===DONE===
