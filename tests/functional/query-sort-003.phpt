--TEST--
Sorting single field, ascending, using the Cursor Iterator
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; CLEANUP(STANDALONE) ?>
<?php require __DIR__ . "/../utils/fixtures-users.inc" ?>
--FILE--
<?php
require_once __DIR__ . "/../utils/basic.inc";

$manager = new MongoDB\Driver\Manager(STANDALONE);

$query = new MongoDB\Driver\Query(array(), array(
    'projection' => array('_id' => 0, 'username' => 1),
    'sort' => array('username' => 1),
));

$qr = $manager->executeQuery(NS, $query);
var_dump($query);

$cursor = $qr->getIterator();
var_dump(get_class($qr), get_class($cursor));

foreach ($cursor as $document) {
    echo $document['username'] . "\n";
}

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
object(MongoDB\Driver\Query)#%d (6) {
  ["query"]=>
  array(2) {
    ["$orderby"]=>
    object(stdClass)#%d (1) {
      ["username"]=>
      int(1)
    }
    ["$query"]=>
    object(stdClass)#%d (0) {
    }
  }
  ["selector"]=>
  array(2) {
    ["_id"]=>
    int(0)
    ["username"]=>
    int(1)
  }
  ["flags"]=>
  int(0)
  ["skip"]=>
  int(0)
  ["limit"]=>
  int(0)
  ["batch_size"]=>
  int(0)
}
string(21) "MongoDB\Driver\Result"
string(21) "MongoDB\Driver\Cursor"
aaliyah.kertzmann
aaron89
abbott.alden
abbott.flo
abby76
abernathy.adrienne
abernathy.audrey
abner.kreiger
aboehm
abshire.icie
abshire.jazlyn
adams.delta
adolph20
adonis.schamberger
agleason
ahartmann
ahettinger
akreiger
al.cormier
al97
albin95
alda.murray
alden.blanda
alessandra76
alex73
alexa01
alfred.ritchie
alia07
alia72
alize.hegmann
allie48
alta.sawayn
alvena.pacocha
alvis22
alycia48
amalia84
amely01
amos.corkery
amos78
anahi95
anais.feest
anais58
andreanne.steuber
angela.dickinson
angelina.bartoletti
angelina31
aniyah.franecki
annalise40
antoinette.gaylord
antoinette.weissnat
aoberbrunner
apacocha
apollich
ara92
arch44
arely.ryan
armstrong.clara
armstrong.gordon
arnold.kiehn
arvel.hilll
asatterfield
aschuppe
ashlynn71
ashlynn85
ashton.o'kon
austen03
austen47
austin67
awintheiser
awyman
ayana.brakus
bailey.mertz
bailey.sarina
balistreri.donald
barrett.prohaska
bartell.susie
bashirian.lina
bayer.ova
baylee.maggio
bbernier
bblick
beahan.oleta
beatty.layne
beatty.myrtis
beau49
beaulah.mann
bechtelar.nadia
becker.theron
beer.mossie
beer.roselyn
benedict.johnson
berge.enoch
bergnaum.roberto
bernardo.mccullough
bernardo52
bernhard.margaretta
bernie.morissette
bethel20
betty09
bins.aliyah
bins.laisha
blanda.danielle
blanda.irving
blanda.ruthe
blaze.miller
block.kasandra
block.toby
bmccullough
botsford.edwardo
botsford.jennie
boyd.balistreri
boyer.khalid
boyle.franco
bpaucek
bpurdy
bradford.heidenreich
brannon24
braun.adaline
braun.jeanie
breanne.schmeler
breitenberg.demarco
brennan.emmerich
bret57
broderick53
brooklyn22
bruecker
bstamm
buckridge.julius
buddy42
bwalker
camilla20
cara.bechtelar
carlotta.kreiger
carolyn09
carolyne63
carroll.emmalee
cartwright.garland
casimir.keebler
casper.eldred
casper.juliana
casper38
cassin.carmel
cassin.krystel
catherine.hilll
cathrine.gislason
cbartoletti
cbecker
cbednar
cbreitenberg
cecelia.schoen
celestine97
cfriesen
cgreenfelder
chad.kuphal
chance.conroy
chasity63
chet.pacocha
christina.simonis
chyna05
citlalli41
ckertzmann
clarabelle65
clementine.grimes
clotilde39
cnikolaus
cole.alice
coleman55
collier.sage
collins.skylar
columbus78
connelly.josefina
conner.doyle
coralie47
cordelia25
corkery.arch
cormier.adriana
cormier.amy
cormier.landen
cormier.vida
cory76
cpaucek
cprice
craig93
creola.emard
creola88
crona.jaclyn
cronin.clint
crooks.josh
crystel24
csipes
cummings.frederic
cwaelchi
cwest
cwhite
cwolf
cydney.hayes
dahlia.white
daisy.johns
dakota.bednar
dakota.wiza
dallas.marquardt
dante.shields
darwin.howe
dave46
davis.bennett
davis.solon
dayne.padberg
dayton03
delaney91
delbert.auer
delia.lindgren
deontae36
dereck.ward
derek.bahringer
derek79
deven.spinka
devon34
dgottlieb
dhudson
dickinson.ashleigh
dillan66
djerde
dock.bednar
dolly.beer
donnie.langosh
dorothy67
dorthy.legros
doyle.nelle
drippin
dubuque.brooklyn
dubuque.cordia
dvandervort
dwiegand
dwolf
earlene.marvin
earline.baumbach
easter73
eauer
ebert.cordie
ebony.williamson
ebony59
edgar33
edgardo.gorczany
edibbert
effertz.mateo
effie.keeling
efren31
egrimes
ehirthe
ehuel
ehuels
eino23
ekoelpin
eldora.steuber
eldred65
elenor33
elesch
eli.mann
elisabeth95
eliseo49
ella.roberts
ellen.krajcik
ellen12
elliot.kling
elliot.weissnat
ellis37
elsie.kuhic
elva.baumbach
elvis45
emelia.ortiz
emerald.shanahan
emerson07
emie.schneider
emilio.crona
emily91
emmalee.waters
enid57
enid78
enoch.hilll
enola.rath
ephraim76
erdman.ethyl
erdman.niko
eriberto.russel
erik04
erika74
ernser.addison
ernser.geovany
ervin.carter
espinka
ethan.daugherty
ethel56
ethelyn46
ethyl68
ettie49
eulah49
fabian55
fadel.trevion
fae00
fahey.rosalee
farrell.asha
farrell.lessie
fbraun
feeney.angelica
feeney.elizabeth
feeney.nathanial
feil.rae
ferdman
ferry.eusebio
fherman
filomena18
finn.torphy
flavie41
florida.o'hara
ford85
fosinski
frami.bulah
franecki.rosetta
fred35
freda25
frederik.stracke
fsporer
fstokes
fturner
gabriel.mccullough
gardner.jacobson
garnet.oberbrunner
garry.windler
gaylord.myrtis
gblock
gbrakus
georgette.mueller
geovanni.jones
geovany07
german.leffler
german40
ggislason
gia15
gibson.amiya
giovani.langworth
giovanna.hickle
giovanny.haley
gislason.mae
gisselle.jacobs
gladyce88
glang
gottlieb.jerry
goyette.roman
gparker
gprosacco
gracie.mcdermott
graciela.jacobson
grayson78
greenfelder.amya
greenfelder.larry
greenfelder.ozella
gretchen19
gretchen38
greynolds
greyson63
grimes.andreane
gulgowski.allie
gusikowski.aliyah
gutkowski.laron
gwunsch
haag.alaina
hackett.alycia
hadley.abernathy
hailee01
hal67
haley.grace
haley.krystel
haley.lauretta
halvorson.bulah
hammes.dimitri
hand.lauren
hand.tiana
hansen.vanessa
harber.larissa
harber.vicenta
harris.kailey
hartmann.dedrick
harvey.hillard
haven13
hayes.delores
hayley08
hazle21
hazle43
heathcote.ashly
hegmann.sallie
heidenreich.julia
helene.o'connell
henriette21
herman.sanford
herzog.eileen
hessel.barry
hflatley
hhackett
hhyatt
hickle.isabell
hirthe.bryana
hirthe.letitia
hirthe.reymundo
hmarvin
hoeger.anastacio
hollie29
howe.abagail
howell.daugherty
hquigley
hrodriguez
hspinka
hstamm
htowne
hudson.bernie
hudson.deion
huels.alfred
huels.enid
hugh22
humberto98
hvandervort
hyatt.astrid
hyatt.soledad
iabernathy
idaugherty
idella50
idonnelly
ifeil
ileuschke
imuller
ipredovic
irwin.gutkowski
irwin31
isabell95
isabella.parisian
isac13
isac67
isaiah47
isaiah50
isaias90
isobel.mraz
ivy73
izabella.hermann
jacobs.carmela
jada.romaguera
jadon.reinger
jailyn62
jalon90
jamaal.cassin
jamarcus.weissnat
janelle93
janice.walker
jannie71
jaquan94
jaqueline.o'kon
jarod94
jarrod.lindgren
jasmin.ruecker
javier.volkman
javier13
javier62
jayda.d'amore
jazmyne63
jborer
jeanette45
jedidiah.hyatt
jefferey02
jenkins.letha
jerald.konopelski
jeremy.o'keefe
jessika.schmeler
jessy16
jett00
jfeest
jheaney
jherzog
jlebsack
jlockman
jo'hara
jodie.casper
johnnie66
johnston.brooklyn
jonas97
jones.jazmyn
jordan.turner
joshua.mraz
josiah59
joyce.casper
jruecker
jschamberger
jschinner
jthompson
jtowne
jude.jakubowski
jude92
juliana.witting
juliet55
june.runolfsson
justina63
jwindler
kadams
kadin.mayer
kaelyn05
kaelyn88
kamille.watsica
kamron88
karson.mante
kasey.abshire
kassandra.reilly
katheryn.walsh
kathlyn02
kathryne.boehm
kattie12
kaya24
kayleigh62
kbeahan
kdicki
keagan.hirthe
keanu21
keanu42
keebler.rupert
keeling.sydnee
keira.dach
kelly.konopelski
kelvin.jakubowski
kerluke.hiram
kernser
keshawn.boyle
kessler.marisol
keyon.gaylord
keyon65
kherman
khills
khudson
kiley63
kip12
kirk40
kirstin.cruickshank
klarson
kleuschke
kling.laila
klocko.filiberto
kmohr
ko'keefe
koch.emmett
koch.sophia
koelpin.yoshiko
krystel.stark
kturcotte
kub.marcel
kuhic.hattie
kuhlman.noel
kuphal.ahmed
kutch.chase
kutch.madonna
kutch.pasquale
kuvalis.nicolette
lane05
larkin.lawson
larue.schuster
laurel35
laurel72
laurence28
lauryn.beer
lbode
lbradtke
leanne.cronin
leannon.zander
lebsack.harmony
ledner.finn
leif52
leilani73
lemke.ernestina
lempi56
leopold69
lesch.delfina
lesch.edna
lesch.nyah
leuschke.erika
lexie.bernier
lexie65
lgrady
lillian50
lilliana.schaden
lily.hansen
lind.dane
lloyd60
lmckenzie
lnicolas
london07
lonnie.little
lonnie10
loraine.hammes
lorna31
louisa76
lquitzon
lubowitz.colleen
lubowitz.jazmyne
lucas.ferry
luciano79
lucienne13
lucio.huel
lucio20
luella.deckow
lullrich
luther.lesch
mac.hermann
macey95
macie.corwin
macy.greenholt
maddison66
madilyn.wyman
madisyn51
madyson.johns
maeve.raynor
maggio.kayli
maia14
mante.ashlee
mante.maymie
marc97
marcel56
marco.gerlach
mariana.sipes
marietta.swift
marina.mayert
marion15
marion35
marjolaine45
mark.casper
marks.trace
marlen34
marlene95
marley.sipes
marvin.ivory
maryjane.kutch
maudie25
mayer.tanner
mccullough.vella
mcdermott.kaitlyn
mckenzie.maximus
mdare
meaghan89
melisa61
metz.elmer
metz.ima
michaela.wolf
miles.pollich
milford39
milford40
mills.emmanuel
mills.rickey
miracle53
misty.boyer
mitchell.delta
mitchell.rafael
mohammad.gorczany
mohammed.lemke
mohr.kylee
mollie.deckow
monroe.o'keefe
monserrate.leannon
monserrate.nikolaus
monty.mills
morar.aniya
mosciski.alanis
mraz.marcelina
mrunte
mtoy
mueller.woodrow
muller.akeem
murazik.maximillia
mwalter
mylene.rogahn
myra43
myron.bechtelar
mzemlak
mzieme
nash88
nasir24
natalia66
nathanial37
nayeli.vandervort
ndouglas
neal.hand
neichmann
neil.gorczany
nellie23
ngoldner
nhaag
nharber
nharris
nicolas.melyssa
nicolas.wendy
nikita.romaguera
nikko.langosh
nikolas.lang
nikolas78
nikolaus.celestino
njacobs
nkshlerin
noah.blick
nolan.nora
nolan.zachariah
nolan56
norma46
novella67
npurdy
nrath
nrowe
nstamm
nward
o'conner.arthur
obie.weissnat
oboyer
octavia36
oda.robel
odare
odell96
ogulgowski
ohaley
ohowe
okuneva.ebba
olga.mertz
olga.waelchi
olin13
oliver.reichert
olson.dedrick
olynch
omarvin
omer.kirlin
ondricka.alexzander
ondricka.joy
orion.quigley
orn.katelyn
orval95
oswaldo.kunze
otreutel
owehner
owen82
pacocha.quentin
pagac.coleman
paige.murphy
parisian.dena
parker.ellie
patience65
patricia.macejkovic
pattie.waters
pattie97
paul.hayes
paula.fahey
paxton73
pbotsford
pconroy
pcruickshank
pdach
perry63
pfannerstill.erna
pframi
phahn
philpert
phodkiewicz
phoebe.crona
phuel
pierre.grant
plesch
pollich.danika
polson
powlowski.alfredo
ppurdy
price49
prohaska.ransom
prudence76
prussel
pschowalter
pwaters
pwatsica
pwisozk
qarmstrong
qbatz
qgislason
qkunze
qmayert
qo'hara
qpowlowski
qromaguera
qryan
qschiller
qschneider
queen75
queenie33
quitzon.greyson
quitzon.maxime
rachel45
raphaelle55
ratke.aurelia
rau.brent
raven.walter
raven.ziemann
raymundo.ferry
raynor.wilmer
rdickens
regan86
reginald.gulgowski
reichert.margaretta
reinger.johnathan
remington.russel
renner.lucius
rey29
rice.ronaldo
rico71
river66
rkoelpin
rmayer
robel.chance
rocky.hoeger
rodger.raynor
rodolfo.effertz
rohan.harmon
rolando38
rolfson.jaren
rosalee52
rosemarie.conn
rosenbaum.elisa
rosetta45
rowe.erik
rschowalter
rubie.hyatt
russel64
rutherford.dawn
sabina11
samara90
sarina.bednar
savannah89
savion82
sawayn.catharine
sawayn.pink
sbailey
schamberger.marcelle
schiller.kameron
schimmel.mavis
schimmel.russell
schmeler.dillon
schmeler.flo
schmidt.elwyn
schmitt.magali
schneider.rita
schowalter.abbigail
schroeder.zoey
schulist.angelo
schumm.carley
schumm.danielle
sebert
selina.thiel
sferry
shaina.emard
shanie.murazik
sheathcote
shegmann
shields.bethany
shoeger
shyann28
sienna53
sigmund.schinner
simeon.nader
skihn
skiles.darrin
skye.jast
skyla.friesen
smith.nico
so'kon
soledad.connelly
sonia05
sorn
spencer.bessie
spencer.darrel
sschumm
ssteuber
stacy.leffler
stark.vladimir
stehr.odell
stella.schowalter
stracke.dakota
streich.abdiel
stroman.rae
susanna55
swyman
sylvia82
tabitha.mohr
talon74
tanya65
tatum.harvey
tbarrows
tcole
terry.corene
terry.florian
tessie.stroman
tgrady
thalia22
theo62
theodore55
theresia68
theron10
tkonopelski
tlind
tomas04
toni57
toy.deshawn
trace03
tressa.price
tressie47
treutel.evert
treutel.minnie
trolfson
tromp.kaleigh
trudie09
trutherford
tsatterfield
tstamm
turcotte.armand
turner.considine
twila75
uabshire
uchamplin
udach
ugusikowski
uhansen
ujenkins
ukovacek
ulesch
ulises.beatty
ulises44
ullrich.layne
umraz
una.larkin
unique.pagac
upton.zackery
urban24
uschmeler
uschumm
usmith
uwisoky
uzieme
van.ruecker
vandervort.ezekiel
vbins
vborer
vbraun
vconn
vdickinson
veffertz
velda.wehner
velma37
vena.schumm
verda93
vesta.ritchie
veum.tyrell
vivianne.macejkovic
von.britney
vorn
vpfeffer
vrolfson
vschulist
vvolkman
vwaters
wade91
walker.alec
walsh.vincenza
walter.lester
walter.norval
walton33
warren.feest
watson70
webster48
webster70
weimann.tillman
west.cristobal
west.jude
wiegand.blanche
wilderman.sophia
wilfred.feil
will.edwina
will.jerod
will.lamont
willms.amari
wilson.white
winnifred08
wisozk.cortez
witting.chris
witting.walker
wiza.carmel
wkertzmann
wolff.caroline
wpacocha
wschaefer
wschimmel
wunsch.mose
wwilkinson
xcassin
xgibson
xgutmann
xhermann
xkohler
xrodriguez
yasmin55
yasmine.lowe
ycole
yfritsch
yhudson
yklein
ylarkin
yost.ari
yost.magali
ypredovic
ywiza
ywyman
yyost
zachery33
zboyle
zella78
zheathcote
ziemann.webster
zieme.noemi
zoe41
zstanton
zulauf.amaya
===DONE===
