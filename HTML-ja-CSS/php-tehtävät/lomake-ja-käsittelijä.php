<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lemmikkien omistajien yhteisö</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nimi = $_POST['nimi'];
        $sahkoposti = $_POST['sahkoposti'];
        $salasana = $_POST['salasana'];
        $sukupuoli = $_POST['sukupuoli'];
        $maakunta = $_POST['maakunta'];
        $lemmikit = isset($_POST['lemmikit']) ? implode(', ', $_POST['lemmikit']) : '';
        $kuvaus = $_POST['kuvaus'];
        $osasto = $_POST['osasto'];
        echo "<p>Osasto: $osasto</p>";


        // Tarkistetaan, että kaikki tähdellä merkityt kentät on täytetty
        if (!empty($nimi) && !empty($sahkoposti) && !empty($salasana)) {
            echo "<h1>Rekisteröitymislomakkeen tiedot:</h1>";
            echo "<p>Nimi: $nimi</p>";
            echo "<p>Sähköposti: $sahkoposti</p>";
            echo "<p>Salasana: $salasana</p>";
            echo "<p>Sukupuoli: $sukupuoli</p>";
            echo "<p>Maakunta: $maakunta</p>";
            echo "<p>Lemmikit: $lemmikit</p>";
            echo "<p>Kuvaus: $kuvaus</p>";
        } else {
            echo "<p style='color: red'>Täytä kaikki tähdellä merkityt kentät!</p>";
        }
    }
    ?>

    <h1>Rekisteröitymislomake</h1>
    <form method="post">
        <label for="nimi">Nimi*: </label>
        <input type="text" name="nimi" required><br><br>

        <label for="sahkoposti">Sähköposti*: </label>
        <input type="email" name="sahkoposti" required><br><br>

        <label for="salasana">Salasana*: </label>
        <input type="password" name="salasana" required><br><br>

        <label for="sukupuoli">Sukupuoli: </label>
        <input type="radio" name="sukupuoli" value="mies">Mies
        <input type="radio" name="sukupuoli" value="nainen">Nainen
        <input type="radio" name="sukupuoli" value="muu">Muu<br><br>

        <label for="maakunta">Maakunta: </label>
        <select name="maakunta">
            <option value="Uusimaa">Uusimaa</option>
            <option value="Varsinais-Suomi">Varsinais-Suomi</option>
        </select><br><br>

        <label for="lemmikit">Lemmikit: </label>
        <input type="checkbox" name="lemmikit[]" value="koira">Koira
        <input type="checkbox" name="lemmikit[]" value="kissa">Kissa
        <input type="checkbox" name="lemmikit[]" value="matelija">Matelija
        <input type="checkbox" name="lemmikit[]" value="lintu">Lintu
        <input type="checkbox" name="lemmikit[]" value="jyrsija">Jyrsijä
        <input type="checkbox" name="lemmikit[]" value="kala">Kala
        <input type="checkbox" name="lemmikit[]" value="muu">Muu<br><br>

        <label for="kuvaus">Kuvaus: </label><br><br>
        <textarea name="kuvaus" cols="50" rows="4"></textarea><br><br>

        <input type="hidden" name="osasto" value="Espoo">

        <input type="submit" value="Rekisteröidy">
    </form>
</body>

</html>