--TEST--
Sorting single field, ascending, using the Cursor Iterator
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; CLEANUP(STANDALONE) ?>
<?php $LIMIT = 100; require __DIR__ . "/../utils/fixtures-users.inc" ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE);

$query = new MongoDB\Driver\Query(array(), array(
    'projection' => array('_id' => 0, 'username' => 1),
    'sort' => array('username' => 1),
));

$qr = $manager->executeQuery(NS, $query);
$cursor = $qr->getIterator();

var_dump(
    $cursor->getBatchSize(),
    $cursor->setBatchSize(15),
    $cursor->getBatchSize(),
    $cursor->isDead()
);


foreach ($cursor as $document) {
    echo $document['username'] . "\n";
}

var_dump(
    $cursor->getBatchSize(),
    $cursor->setBatchSize(15),
    $cursor->getBatchSize(),
    $cursor->isDead()
);
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
int(0)
int(0)
int(15)
bool(true)
abernathy.audrey
alda.murray
andreanne.steuber
armstrong.gordon
aschuppe
ashton.o'kon
balistreri.donald
bartell.susie
beahan.oleta
bergnaum.roberto
camilla20
cartwright.garland
chance.conroy
crona.jaclyn
cronin.clint
dereck.ward
dhudson
doyle.nelle
dwolf
ebert.cordie
ebony59
edibbert
eldora.steuber
eliseo49
ernser.addison
ervin.carter
farrell.asha
ford85
fosinski
german.leffler
gladyce88
haley.krystel
hartmann.dedrick
helene.o'connell
isac13
jailyn62
jamaal.cassin
janelle93
javier.volkman
javier13
jazmyne63
jessika.schmeler
jessy16
jfeest
jschinner
justina63
kattie12
keebler.rupert
kelvin.jakubowski
khills
koch.sophia
lmckenzie
lonnie.little
lonnie10
lubowitz.colleen
lucio20
mante.ashlee
marietta.swift
marlene95
mraz.marcelina
myra43
nayeli.vandervort
ngoldner
npurdy
o'conner.arthur
odell96
ohowe
orn.katelyn
pacocha.quentin
qkunze
qschiller
rau.brent
rodger.raynor
sawayn.catharine
shyann28
spencer.darrel
ssteuber
swyman
tabitha.mohr
talon74
thalia22
von.britney
vrolfson
vwaters
walker.alec
walter.lester
west.jude
wisozk.cortez
witting.chris
wschaefer
wschimmel
wwilkinson
xgibson
yasmin55
yhudson
yost.ari
yost.magali
ypredovic
ywyman
zstanton
int(15)
int(15)
int(15)
bool(true)
===DONE===
