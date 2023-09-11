<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muuttujat ja Kontrollirakenteet</title>
</head>

<body>
    <!-- Tulosta Hello World -->
    <h1>1. Hello World</h1>
    <?php
    echo "Hei maailma!";
    ?>

    <!-- Tulosta ohjelmointikieliä -->
    <h1>2. Ohjelmointikielet</h1>
    <?php
    $php = "PHP";
    $java = "Java";
    $perl = "Perl";
    $jscript = "JavaScript";
    ?>

    <h2>Ohjelmointikielet</h2>
    <ul>
        <li>
            <?php echo $php; ?>
        </li>
        <li>
            <?php echo $java; ?>
        </li>
        <li>
            <?php echo $perl; ?>
        </li>
        <li>
            <?php echo $jscript; ?>
        </li>
    </ul>

    <!-- Laskutoimitukset -->
    <h1>3. Laskutoimitukset</h1>
    <?php
    $luku1 = 1;
    $luku2 = 2;
    echo "$luku1 + $luku2 = " . ($luku1 + $luku2) . "<br>";
    echo "$luku1 - $luku2 = " . ($luku1 - $luku2) . "<br>";
    echo "$luku1 * $luku2 = " . ($luku1 * $luku2) . "<br>";
    echo "$luku1 / $luku2 = " . ($luku1 / $luku2) . "<br>";
    echo "$luku1 % $luku2 = " . ($luku1 % $luku2) . "<br>";
    ?>

    <!-- Muuttujan muokkaus -->
    <h1>4. Muuttujan muokkaus</h1>
    <?php
    $luku = 8;
    echo "Arvo on nyt $luku.<br>";
    $luku += 2;
    echo "Lisää 2. Arvo on nyt $luku.<br>";
    $luku -= 4;
    echo "Vähennä 4. Arvo on nyt $luku.<br>";
    $luku *= 5;
    echo "Kerro 5:llä. Arvo on nyt $luku.<br>";
    $luku /= 3;
    echo "Jaa 3:lla. Arvo on nyt $luku.<br>";
    $luku++;
    echo "Inkrementoi arvoa yhdellä. Arvo on nyt $luku.<br>";
    $luku--;
    echo "Dekrementoi arvoa yhdellä. Arvo on nyt $luku.<br>";
    ?>

    <!-- Arvo muuttujaan $luku satunnainen kokonaisluku väliltä 1-10. Tulosta arvottu luku. Tee if-else -lause, joka tulostaa "Pieni!" luvun ollessa pienempi tai yhtäsuuri kuin 5, muuten "Suuri!" -->
    <h1>5. Ehtolause</h1>
    <?php
    $luku = rand(1, 10);
    echo "Arvottu luku: $luku<br>";
    if ($luku <= 5) {
        echo "Pieni!";
    } else {
        echo "Suuri!";
    }
    ?>

    <!-- Arvo muuttujaan $arvosana satunnainen kokonaisluku väliltä 1-3. Tulosta arvottu luku ja sen perusteella arvosana. Jos luku on 3, tulosta "Kiitettävä", jos 2, tulosta "Hyvä", muuten tulosta "Tyydyttävä". -->
    <h1>6. Monivalinta</h1>
    <?php
    $arvosana = rand(1, 3);
    if ($arvosana == 3) {
        echo "$arvosana Kiitettävä";
    } elseif ($arvosana == 2) {
        echo "$arvosana Hyvä";
    } else {
        echo "$arvosana Tyydyttävä";
    }
    ?>

    <!-- Tulosta 5 kertaa "JensonDesign" -->
    <h1>7. While-silmukka</h1>
    <?php
    $i = 0;
    while ($i < 5) {
        echo "JensonDesign<br>";
        $i++;
    }
    ?>

    <!-- Tulosta kertotaulu luvulle 10 -->
    <h1>8. For-silmukka</h1>
    <?php
    $kertotauluNumero = 10;
    for ($i = 1; $i <= $kertotauluNumero; $i++) {
        echo "$i * $kertotauluNumero = " . ($i * $kertotauluNumero) . "<br>";
    }
    ?>

    <!-- Tulosta luvut 1-10 väliltä erotettuna väliviivalla. -->
    <h1>9. Lukujen tulostaminen</h1>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
        if ($i < 10) {
            echo "-";
        }
    }
    ?>

    <!-- Laske luvun 4 kertoma -->
    <h1>10. Kertoma</h1>
    <?php
    $luku = 4;
    $kertoma = 1;
    for ($i = $luku; $i > 0; $i--) {
        $kertoma *= $i;
    }
    echo "$luku:n kertoma on $kertoma";
    ?>

    <!-- Tulosta kertotaulu 1-10 väliltä -->
    <h1>11. Taulukko</h1>
    <table border="1">
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>