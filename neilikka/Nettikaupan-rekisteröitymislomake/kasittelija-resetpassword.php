<?php
// Tarkista, onko lomakkeen "nollaa" -painiketta painettu
if (isset($_POST['nollaa'])) {
    // Otetaan yhteys tietokantaan
    $db = new mysqli('datasql2.westeurope.cloudapp.azure.com:6001', 'millerje', 'Yz!u,zpz^S4G%RZ', 'neilikka');

    // Tarkista tietokantayhteys
    if ($db->connect_error) {
        die("Tietokantayhteyden virhe: " . $db->connect_error);
    }

    // Hae token lomakkeelta
    $token = $_POST['token'];

    // Hae users_id liittämällä tokenin käyttäjään
    $query = "SELECT user_id FROM resetpassword_tokens WHERE token = ? AND voimassa > NOW()";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Lisää token ja voimassaoloaika resetpassword_tokens-tauluun
        $token = bin2hex(random_bytes(32));
        $voimassaoloaika = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token on voimassa esimerkiksi 1 tunti
        $query = "INSERT INTO resetpassword_tokens (user_id, token, voimassa) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("iss", $user_id, $token, $voimassaoloaika);
        $stmt->execute();


        // Hae ja tarkista uusi salasana
        $new_password = $_POST['salasana'];
        $confirm_password = $_POST['salasana_uudestaan'];

        if ($new_password === $confirm_password) {
            // Muuta uusi salasana hash-muotoon
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Päivitä uusi salasana users-tauluun
            $update_query = "UPDATE users SET password = ? WHERE id = ?";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->bind_param("si", $hashed_password, $user_id);
            $update_stmt->execute();

            // Poista token resetpassword_tokens-taulusta
            $delete_query = "DELETE FROM resetpassword_tokens WHERE token = ?";
            $delete_stmt = $db->prepare($delete_query);
            $delete_stmt->bind_param("s", $token);
            $delete_stmt->execute();

            // Ohjaa käyttäjä login.php-sivulle
            header("Location: kirjaudusisaan-lomake.php");
            exit();
        } else {
            echo "Salasanat eivät täsmää.";
        }
    } else {
        echo "Virheellinen tai vanhentunut token.";
    }
}
