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
    header('Location: etusivu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navipalkki ja kirjautuminen</title>
</head>

<body>
    <div class="navbar">
        <a href="etusivu.php">Etusivu</a>
        <a href="tietoja.php">Tietoja</a>
        <?php
        // Tarkista kirjautumistila ja näytä linkki sen perusteella
        if ($kirjautunut) {
            echo '<a href="profiili.php">Profiili</a>';
        } else {
            echo '<a href=".kirjautuminen.php">Kirjaudu</a>';
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