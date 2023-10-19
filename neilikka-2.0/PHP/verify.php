<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ota yhteyttä tietokantaan
$azure_palvelin = "datasql2.westeurope.cloudapp.azure.com:6001";
$azure_kayttaja = "millerje";
$azure_salasana = "Yz!u,zpz^S4G%RZ";
$azure_tietokanta = "neilikka-2.0";

$db = new mysqli($azure_palvelin, $azure_kayttaja, $azure_salasana, $azure_tietokanta);

// Tarkista tietokantayhteys
if ($db->connect_error) {
    die("Tietokantayhteyden virhe: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $token = $_GET["token"];

    // Check if token is valid
    $stmt = $db->prepare("SELECT email FROM users WHERE confirmation_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Update user's email address as confirmed
        $stmt = $db->prepare("UPDATE users SET confirmed = 1 WHERE confirmation_token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        echo "Sähköpostiosoitteesi on vahvistettu!";
    } else {
        echo "Virheellinen vahvistuskoodi.";
    }
}
