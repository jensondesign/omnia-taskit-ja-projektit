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
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sessioparametrit</title>
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

    <h1>Aseta sessioparametrit</h1>
    <form method="post">
        <label for="avain">Avain: </label>
        <input type="text" name="avain" required><br><br>

        <label for="arvo">Arvo: </label>
        <input type="text" name="arvo" required><br><br>

        <input type="submit" value="Aseta">
    </form>

    <h2>Sessioparametrit</h2>
    <ul>
        <?php
        // Tulostetaan kaikki sessioparametrit
        foreach ($_SESSION as $avain => $arvo) {
            echo "<li>$avain: $arvo</li>";
        }
        ?>
    </ul>

    <p><a href="session-asettaminen.php?ulos=k">Kirjaudu ulos ja poista sessio</a></p>
</body>

</html>