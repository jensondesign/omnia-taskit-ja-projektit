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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Virheellinen sähköpostiosoite.");
    }

    // Validate password
    if (strlen($password) < 8) {
        die("Salasanassa pitää olla vähintään 8 merkkiä.");
    }

    // Check password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        die('Salasanan pitää olla vähintään 8 merkkiä pitkä ja sisältää vähintään 1 iso kirjain, 1 numero ja 1 erikoismerkki.');
    }

    // Check password confirmation
    if ($password !== $confirm_password) {
        die("Salasanat eivät täsmää.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    try {
        $pdo = new PDO("mysql:host=$azure_palvelin;dbname=$azure_tietokanta", $azure_kayttaja, $azure_salasana);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Generate confirmation token
        $confirmation_token = bin2hex(random_bytes(16));
    
        // Insert user into database with confirmation token
        $sql = "INSERT INTO users (email, password, confirmation_token) VALUES (:email, :password, :confirmation_token)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':confirmation_token', $confirmation_token);
    
        $stmt->execute();
    
        // Send verification email
        $to = $email;
        $subject = 'Vahvista sähköpostiosoitteesi';
        $message = "Paina alla olevaa linkkiä vahvistaaksesi sähköpostiosoitteesi: https://example.com/verify.php?token=$confirmation_token";
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
        mail($to, $subject, $message, $headers);
    
        echo "Rekisteröinti onnistui! Tarkista sähköpostisi vahvistaaksesi tilisi.";
    } catch (PDOException $e) {
        die("Rekisteröinti epäonnistui: " . $e->getMessage());
    }
}
