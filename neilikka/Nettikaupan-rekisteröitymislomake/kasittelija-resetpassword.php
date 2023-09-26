<?php
// Ota mukaan tietokantayhteys ja muita tarvittavia tiedostoja
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

// Ota mukaan tietokantayhteys ja muita tarvittavia tiedostoja

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tarkista, että sähköposti on kelvollinen
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    
    if ($email === false) {
        echo "Virheellinen sähköpostiosoite.";
        exit;
    }

    // Tarkista, onko sähköposti olemassa tietokannassa
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Luo ainutlaatuinen nollauslinkin token 
        $token = bin2hex(random_bytes(32));

        // Tallenna token, käyttäjän nimi ja timestamp tietokantaan
        $stmt->bind_result($username, $email);
        $stmt->fetch();
        $stmt->close();
        
        $stmt = $conn->prepare("INSERT INTO resetpassword_tokens (username, email, token, voimassa) VALUES (?, ?, ?, NOW())");
        $expiry = date("Y-m-d H:i:s", strtotime("+1 day"));
        $stmt->bind_param("sss", $username, $email, $token);
        $stmt->execute();

        // Lähetä sähköposti käyttäjälle
        $reset_link = "resetpassword.php?token=" . $token;
        $subject = "Salasanan nollaus";
        $message = "Nollaa salasanasi tästä linkistä: " . $reset_link;

        if (mail($email, $subject, $message)) {
            echo "Sähköposti lähetetty. Tarkista sähköpostisi ja nollaa salasanasi.";
        } else {
            echo "Virhe sähköpostin lähetyksessä.";
        }
    } else {
        echo "Sähköpostia ei löytynyt tietokannasta";
    }
} else {
    echo "Virheellinen pyyntö.";
}
