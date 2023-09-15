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

// Tarkistetaan, onko "special_features" saatavilla POST-taulukossa
$special_features = isset($_POST["special_features"]) ? $_POST["special_features"] : array();

// Muut kentät
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

// Tarkistetaan, että kaikki tarvittavat kentät ovat täytetty
if (empty($nimi) || empty($kuvaus) || empty($julkaisuvuosi) || empty($kieli) || empty($kesto) || empty($ikaraja) || empty($genre) || empty($vuokra_aika) || empty($vuokrahinta) || empty($korvaushinta)) {
    die("Et täyttänyt kaikkia kenttiä!");
}

// Tässä voit jatkaa tallennuslogiikkaasi käyttämällä $special_features-muuttujaa
// ...

// Esimerkki tietokantaan tallentamisesta (huomaa, että tämä on vain esimerkki):
$special_features_str = implode(', ', $special_features);
$sql = "INSERT INTO film (title, description, special_features) VALUES ('$nimi', '$kuvaus', '$special_features_str')";
// Suorita tietokantakysely
if ($conn->query($sql) === TRUE) {
    echo "Elokuva tallennettu onnistuneesti.";
} else {
    echo "Virhe tallennettaessa elokuvaa: " . $conn->error;
}

// Sulje tietokantayhteys
$conn->close();
