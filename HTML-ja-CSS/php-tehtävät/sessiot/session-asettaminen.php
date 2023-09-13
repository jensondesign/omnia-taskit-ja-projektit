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