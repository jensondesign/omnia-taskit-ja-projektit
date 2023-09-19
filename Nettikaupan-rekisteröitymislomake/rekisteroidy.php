<?php

// Tarkista, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot
    $etunimi = $_POST["firstName"];
    $sukunimi = $_POST["lastName"];
    $kayttajanimi = $_POST["username"];
    $salasana = $_POST["password"];
    $sahkoposti = $_POST["email"];
    $osoite = $_POST["address"];
    $asunnonnro = $_POST["address2"];
    $maa = $_POST["country"];
    $maakunta = $_POST["state"];
    $postinumero = $_POST["zip"];
    $maksutapa = $_POST["maksutapa"];
    $palaute = $_POST["palaute"];

    // Yhdistä tietokantaan
    $servername = "datasql2.westeurope.cloudapp.azure.com:8081";
    $username = "millerje";
    $password = "Yz!u,zpz^S4G%RZ";
    $dbname = "neilikka";

    // Tarkista yhteys
    if ($conn->connect_error) {
        die("Yhteys epäonnistui: " . $conn->connect_error);
    }

    // Valmistele SQL-lauseke ja suorita se tietokantaan
    $sql = "INSERT INTO users (etunimi, sukunimi, kayttajanimi, salasana, sahkoposti, osoite, asunnonnro, maa, maakunta, postinumero, maksutapa, palaute)
    VALUES ('$etunimi', '$sukunimi', '$kayttajanimi', '$salasana', '$sahkoposti', '$osoite', '$asunnonnro', '$maa', '$maakunta', '$postinumero', '$maksutapa', '$palaute')";

    if ($conn->query($sql) === TRUE) {
        echo "Rekisteröityminen onnistui!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Sulje yhteys
    $conn->close();
}
