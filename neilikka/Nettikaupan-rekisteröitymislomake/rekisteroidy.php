<?php

// Tarkista, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hae lomakkeen tiedot
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $address = $_POST["address"];
    $address2 = $_POST["address2"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $maksutapa = $_POST["maksutapa"];
    $palaute = $_POST["palaute"];

    // Määritä tietokannan tiedot suoraan
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

    // Valmista SQL-kysely
    $sql = "INSERT INTO users (firstName, lastName, username, password, email, address, address2, country, state, zip, maksutapa, palaute)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $firstName, $lastName, $username, $password, $email, $address, $address2, $country, $state, $zip, $maksutapa, $palaute);

    if ($stmt->execute()) {
        $rekisteröinti_onnistui = true;
        echo "Rekisteröinti onnistui!";
    } else {
        echo "Rekisteröinti epäonnistui: " . $stmt->error;
    }

    if ($rekisteröinti_onnistui) {
        // Ohjaa käyttäjä etusivulle rekisteröinnin jälkeen
        header("Location: ../etusivu.html");
        exit;
    }

    // Sulje yhteys
    $stmt->close();
    $conn->close();
}
