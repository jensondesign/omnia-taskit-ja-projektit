<?php

$azure_palvelin = "datasql2.westeurope.cloudapp.azure.com:6001"; // Korvaa oikealla tietokantapalvelimen osoitteella
$azure_kayttaja = "millerje"; // Korvaa oikealla käyttäjänimellä
$azure_salasana = "Yz!u,zpz^S4G%RZ"; // Korvaa oikealla salasanalla
$azure_tietokanta = "neilikka"; // Korvaa oikealla tietokannan nimellä

// Yhdistä tietokantaan
$conn = new mysqli($azure_palvelin, $azure_kayttaja, $azure_salasana, $azure_tietokanta);

// Tarkista yhteys
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $syotetty_kayttajanimi = $_POST["username"];
    $syotetty_salasana = $_POST["password"];

    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $syotetty_kayttajanimi);
    $stmt->execute();
    $stmt->bind_result($tietokanta_kayttajanimi, $tietokanta_salasana);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($syotetty_salasana, $tietokanta_salasana) && $syotetty_kayttajanimi === $tietokanta_kayttajanimi) {
        header("Location: ../etusivu.html");
        exit;
    } else {
        echo "Käyttäjänimi tai salasana on väärin";
    }
}

// Sulje yhteys
$conn->close();
