<?php
function tulostaTyylit()
{
    echo '<style>
    .valkoinen {background-color: lightgray; width: 30px; height: 30px;}
    .musta {background-color: black; width: 30px; height: 30px;}
    </style>';
}

// Kutsutaan funktiota sivun head-osassa
tulostaTyylit();
?>

<?php
function tervehdi($nimi)
{
    echo "Hei, $nimi!";
}

// Kutsutaan funktiota sivulta
tervehdi("Matti");
?>

<?php
function kerto($luku1, $luku2)
{
    $tulos = $luku1 * $luku2;
    return $tulos;
}

// Kutsutaan funktiota ja tulostetaan palautettu arvo
$tulos = kerto(5, 3);
echo "Kertolaskun tulos: $tulos";
?>

<?php
function potenssi($kantaluku, $eksponentti)
{
    $tulos = 1;
    for ($i = 1; $i <= $eksponentti; $i++) {
        $tulos *= $kantaluku;
    }
    return $tulos;
}

// Kutsutaan funktiota ja tulostetaan palautettu arvo
$tulos = potenssi(2, 4);
echo "Potenssin tulos: $tulos";
?>

<table>
    <?php
    function shakkilauta()
    {
        for ($rivi = 0; $rivi < 8; $rivi++) {
            echo '<tr>';
            for ($sarake = 0; $sarake < 8; $sarake++) {
                if (($rivi + $sarake) % 2 == 0) {
                    echo '<td class="valkoinen"></td>';
                } else {
                    echo '<td class="musta"></td>';
                }
            }
            echo '</tr>';
        }
    }

    // Kutsutaan funktiota sivulta
    shakkilauta();
    ?>
</table>