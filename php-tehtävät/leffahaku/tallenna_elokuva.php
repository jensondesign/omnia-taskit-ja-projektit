<?php

// Tietokantaan yhdistäminen
$servername = "localhost"; // Tietokantapalvelimen osoite
$username = "root"; // Tietokantakäyttäjän nimi
$password = ""; // Tietokantakäyttäjän salasana
$database = "sakila"; // Tietokannan nimi

// Luodaan yhteys tietokantaan
$conn = new mysqli($servername, $username, $password, $database);

// Tarkistetaan yhteys
if ($conn->connect_error) {
    die("Yhteys tietokantaan epäonnistui: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkistetaan, että kaikki tarvittavat kentät ovat täytetty
    if (empty($_POST["nimi"]) || empty($_POST["kuvaus"]) || empty($_POST["julkaisuvuosi"]) || empty($_POST["kieli"]) || empty($_POST["kesto"]) || empty($_POST["ikaraja"]) || empty($_POST["genre"]) || empty($_POST["vuokra-aika"]) || empty($_POST["vuokrahinta"]) || empty($_POST["korvaushinta"])) {
        die("Et täyttänyt kaikkia kenttiä!");
    }

    //Tallenna lomakkeen tiedot tietokantaan
    $nimi = $_POST["nimi"];
    $kuvaus = $_POST["kuvaus"];
    $julkaisuvuosi = $_POST["julkaisuvuosi"];
    $kieli = $_POST["kieli"];
    $kesto = $_POST["kesto"];
    $ikaraja = $_POST["ikaraja"];
    $genre = $_POST["genre"];
    $vuokra_aika = $_POST["vuokra-aika"];
    $vuokrahinta = $_POST["vuokrahinta"];
    $korvaushinta = $_POST["korvaushinta"];
    $special_features = implode(", ", $_POST["special_features"]); // Yhdistetään valitut special features
}
