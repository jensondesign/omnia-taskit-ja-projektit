<?php

// Tarkista, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot
    $etunimi = $_POST["firstName"];
    $sukunimi = $_POST["lastName"];
    $kayttajanimi = $_POST["username"];
    $salasana = password_hash($_POST["password"], PASSWORD_DEFAULT); // Salaa salasanan
    $sahkoposti = $_POST["email"];
    $osoite = $_POST["address"];
    $asunnonnro = $_POST["address2"];
    $maa = $_POST["country"];
    $maakunta = $_POST["state"];
    $postinumero = $_POST["zip"];
    $maksutapa = $_POST["maksutapa"];
    $palaute = $_POST["palaute"];

    // Yhdistä tietokantaan oikein
    $servername = "datasql2.westeurope.cloudapp.azure.com:8081"; // Korvaa oikealla tietokantapalvelimen osoitteella
    $username = "millerje"; // Korvaa oikealla käyttäjänimellä
    $password = "Yz!u,zpz^S4G%RZ"; // Korvaa oikealla salasanalla
    $dbname = "neilikka";

    // Luo yhteys
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tarkista yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Valmistele SQL-lauseke
    $stmt = $conn->prepare("INSERT INTO users (etunimi, sukunimi, kayttajanimi, salasana, sahkoposti, osoite, asunnonnro, maa, maakunta, postinumero, maksutapa, palaute) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $etunimi, $sukunimi, $kayttajanimi, $salasana, $sahkoposti, $osoite, $asunnonnro, $maa, $maakunta, $postinumero, $maksutapa, $palaute);

    if ($stmt->execute()) {
        echo "Rekisteröityminen onnistui!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Sulje yhteys
    $stmt->close();
    $conn->close();
}
