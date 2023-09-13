<?php
// Aloita istunto
session_start();

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
    <title>Navipalkki ja kirjautuminen</title>
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
    // Näytä kirjautumislomake, jos käyttäjä ei ole kirjautunut
    if (!$kirjautunut) {
        echo '<h2>Kirjaudu sisään</h2>';
        echo '<form method="post">';
        echo '   <label for="kayttajatunnus">Käyttäjätunnus:</label>';
        echo '   <input type="text" name="kayttajatunnus" required>';
        echo '   <input type="submit" value="Kirjaudu">';
        echo '</form>';
    }
    ?>

</body>

</html>