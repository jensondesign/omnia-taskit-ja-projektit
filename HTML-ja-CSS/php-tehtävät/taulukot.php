<?php
$ostoslista = ["maitoa", "leipää", "jauhelihaa", "riisi"];
array_push($ostoslista, "omenoita");
$ostoslista[0] = "rasvatonta maitoa";
sort($ostoslista);
?>

<h1>Ostoslista</h1>
<ul>
    <?php foreach ($ostoslista as $tuote) : ?>
        <li><?php echo $tuote; ?></li>
    <?php endforeach; ?>
</ul>

<?php
$taulukko = [];

for ($i = 1; $i <= 100; $i++) {
    $taulukko[] = $i;
}

shuffle($taulukko);
$viisiEnsimmäista = array_slice($taulukko, 0, 5);
?>

<h1>Viisi ensimmäistä satunnaista lukua:</h1>
<ul>
    <?php foreach ($viisiEnsimmäista as $luku) : ?>
        <li><?php echo $luku; ?></li>
    <?php endforeach; ?>
</ul>

<?php
$paakaupungit = array(
    "Italia" => "Rooma",
    "Tanska" => "Kööpenhamina",
    "Suomi" => "Helsinki",
    "Ranska" => "Pariisi",
    "Saksa" => "Berliini",
    "Kreikka" => "Ateena",
    "Irlanti" => "Dublin",
    "Hollanti" => "Amsterdam",
    "Espanja" => "Madrid",
    "Ruotsi" => "Tukholma",
    "Iso-Britannia" => "Lontoo",
    "Viro" => "Tallinna",
    "Unkari" => "Budapest",
    "Itävalta" => "Vienna",
    "Puola" => "Varsova"
);

ksort($paakaupungit);
?>

<h1>Pääkaupungit</h1>
<ul>
    <?php foreach ($paakaupungit as $maa => $paakaupunki) : ?>
        <li><?php echo "$maa: $paakaupunki"; ?></li>
    <?php endforeach; ?>
</ul>

<?php
function summaTaulukosta($taulukko)
{
    $summa = 0;
    foreach ($taulukko as $luku) {
        $summa += $luku;
    }
    return $summa;
}

$taulukko1 = [1, 2, 3, 4, 5];
$taulukko2 = [10, 20, 30];

$summa1 = summaTaulukosta($taulukko1);
$summa2 = summaTaulukosta($taulukko2);
?>

<h1>Taulukko 1 summa: <?php echo $summa1; ?></h1>
<h1>Taulukko 2 summa: <?php echo $summa2; ?></h1>

<?php
function arvoTaulukossa($taulukko, $arvo)
{
    foreach ($taulukko as $luku) {
        if ($luku == $arvo) {
            return true;
        }
    }
    return false;
}

$taulukko3 = [100, 200, 300, 400, 500];
$etsittavaArvo = 200;
$tulos = arvoTaulukossa($taulukko3, $etsittavaArvo);
?>

<h1>Arvo <?php echo $etsittavaArvo; ?> löytyy taulukosta: <?php echo $tulos ? "Kyllä" : "Ei"; ?></h1>