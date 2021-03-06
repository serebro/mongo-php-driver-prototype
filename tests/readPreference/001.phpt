--TEST--
MongoDB\Driver\ReadPreference#001
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE);


$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY);
$rp2 = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_SECONDARY, array("tag" => "one"));
$rp3 = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY, array());
var_dump($rp, $rp2, $rp3);

try {
    $rp4 = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY, array("tag" => "one"));
} catch(InvalidArgumentException $e) {
    echo $e->getMessage(), "\n";
}

try {
    $broken = new MongoDB\Driver\ReadPreference(42);
} catch(InvalidArgumentException $e) {
    echo $e->getMessage(), "\n";
}

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
object(MongoDB\Driver\ReadPreference)#%d (%d) {
  ["mode"]=>
  int(1)
  ["tags"]=>
  array(0) {
  }
}
object(MongoDB\Driver\ReadPreference)#%d (%d) {
  ["mode"]=>
  int(2)
  ["tags"]=>
  array(1) {
    ["tag"]=>
    string(3) "one"
  }
}
object(MongoDB\Driver\ReadPreference)#%d (%d) {
  ["mode"]=>
  int(1)
  ["tags"]=>
  array(0) {
  }
}
Invalid tagSet
Invalid ReadPreference
===DONE===
