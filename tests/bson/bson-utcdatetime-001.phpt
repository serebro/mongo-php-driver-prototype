--TEST--
BSON BSON\UTCDatetime #001
--INI--
date.timezone=America/Los_Angeles
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; CLEANUP(STANDALONE) ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE);

$utcdatetime = new BSON\UTCDatetime("1416445411987");
$result = $manager->executeInsert(NS, array('_id' => 1, 'x' => $utcdatetime));
$query = new MongoDB\Driver\Query(array('_id' => 1));
$cursor = $manager->executeQuery(NS, $query);
$array = iterator_to_array($cursor);


$date = $utcdatetime->toDateTime();
var_dump($date->format(DATE_RSS));

echo $utcdatetime, "\n";

throws(function() {
    $d = new BSON\UTCDatetime;
}, "InvalidArgumentException");

$tests = array(
    array($utcdatetime),
    array($array[0]["x"]),
    array($date),
);

foreach($tests as $n => $test) {
    $s = BSON\fromArray($test);
    echo "Test#{$n} ", $json = BSON\toJSON($s), "\n";
    $bson = BSON\fromJSON($json);
    $testagain = BSON\toArray($bson);
    var_dump(BSON\toJSON(BSON\fromArray($test)), BSON\toJSON(BSON\fromArray($testagain)));
    var_dump((object)$test == (object)$testagain);
}
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
string(31) "Thu, 20 Nov 2014 01:03:31 +0000"
1416445411987
OK: Got InvalidArgumentException
Test#0 { "0" : { "$date" : 1416445411987 } }
string(37) "{ "0" : { "$date" : 1416445411987 } }"
string(37) "{ "0" : { "$date" : 1416445411987 } }"
bool(true)
Test#1 { "0" : { "$date" : 1416445411987 } }
string(37) "{ "0" : { "$date" : 1416445411987 } }"
string(37) "{ "0" : { "$date" : 1416445411987 } }"
bool(true)
Test#2 { }
string(3) "{ }"
string(3) "{ }"
bool(false)
===DONE===
