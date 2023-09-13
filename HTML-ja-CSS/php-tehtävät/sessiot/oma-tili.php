<?php
session_start();

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $avain = $_POST['avain'];
    $arvo = $_POST['arvo'];

    // Asetetaan sessioparametrit
    $_SESSION[$avain] = $arvo;
}

// Tarkistetaan, onko "ulos" parametri asetettu, ja jos on, poistetaan sessio
if (isset($_GET['ulos']) && $_GET['ulos'] === 'k') {
    session_destroy();
    header('Location: session-asettaminen.php'); // Uudelleenohjataan käyttäjä takaisin tälle sivulle
    exit;
}
?>

<?php

// Tarkista onko käyttäjä kirjautunut sisään
$kirjautunut = isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true;

// Käsittele kirjautumislomakkeen toiminto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tarkista käyttäjätunnus (voit lisätä tässä salasanan tarkistuksen tarvittaessa)
    $kayttajatunnus = $_POST['kayttajatunnus'];

    // Tallenna kirjautumistila sessioon
    $_SESSION['kirjautunut'] = true;
    $_SESSION['kayttajatunnus'] = $kayttajatunnus;

    // Ohjaa käyttäjä takaisin etusivulle tai minne haluat
    header('Location: session-asettaminen.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiilisivu</title>
    <style>
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="session-asettaminen.php">Etusivu</a>
        <a href="tietoja.php">Tietoja</a>
        <?php
        // Tarkista kirjautumistila ja näytä linkki sen perusteella
        if ($kirjautunut) {
            echo '<a href="oma-tili.php">Profiili</a>';
        } else {
            echo '<a href="kirjautuminen.php">Kirjaudu</a>';
        }
        ?>
        <a href="yhteystiedot.php">Yhteystiedot</a>
    </div>

    <?php

    // Tarkista onko käyttäjä kirjautunut sisään
    $kirjautunut = isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true;

    if ($kirjautunut) {
        // Näytä käyttäjän tiedot
        $kayttajatunnus = $_SESSION['kayttajatunnus'];
        echo "<h1>Tervetuloa, $kayttajatunnus!</h1>";

        // Voit lisätä muita profiilin tietoja tässä, esim.
        // $kuvaus = $_SESSION['kuvaus'];
        // echo "<p>Kuvaus: $kuvaus</p>";
    } else {
        // Käyttäjä ei ole kirjautunut sisään, voit ohjata hänet takaisin kirjautumissivulle tai minne haluat
        header('Location: kirjautuminen.php');
        exit();
    }
    ?>

    <?php
    // Tarkista onko käyttäjä kirjautunut sisään
    $kirjautunut = isset($_SESSION['kirjautunut']) && $_SESSION['kirjautunut'] === true;

    if ($kirjautunut) {
        echo '<a href="kirjaudu-ulos.php">Kirjaudu ulos</a>';
    }
    ?>

    <!-- Voit lisätä muita sisältöä ja toiminnallisuuksia profiilisivulle tarpeidesi mukaan -->
</body>

</html>