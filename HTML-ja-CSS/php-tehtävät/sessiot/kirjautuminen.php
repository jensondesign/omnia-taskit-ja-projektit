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
<<<<<<< HEAD
    header('Location: etusivu.php');
=======
    header('Location: session-asettaminen.php');
>>>>>>> f24702a1b500a2bd33b33924312be72c95d90f54
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navipalkki ja kirjautuminen</title>
<<<<<<< HEAD
=======
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
>>>>>>> f24702a1b500a2bd33b33924312be72c95d90f54
</head>

<body>
    <div class="navbar">
<<<<<<< HEAD
        <a href="etusivu.php">Etusivu</a>
=======
        <a href="session-asettaminen.php">Etusivu</a>
>>>>>>> f24702a1b500a2bd33b33924312be72c95d90f54
        <a href="tietoja.php">Tietoja</a>
        <?php
        // Tarkista kirjautumistila ja näytä linkki sen perusteella
        if ($kirjautunut) {
<<<<<<< HEAD
            echo '<a href="profiili.php">Profiili</a>';
        } else {
            echo '<a href=".kirjautuminen.php">Kirjaudu</a>';
=======
            echo '<a href="oma-tili.php">Profiili</a>';
        } else {
            echo '<a href="kirjautuminen.php">Kirjaudu</a>';
>>>>>>> f24702a1b500a2bd33b33924312be72c95d90f54
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