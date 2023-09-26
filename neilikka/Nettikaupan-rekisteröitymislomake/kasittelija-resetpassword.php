<?php
// Tarkista, onko lomakkeen "nollaa" -painiketta painettu
if (isset($_POST['nollaa'])) {
    // Otetaan yhteys tietokantaan (käytä mysqli)
    $db = new mysqli('datasql2.westeurope.cloudapp.azure.com:6001', 'millerje', 'Yz!u,zpz^S4G%RZ', 'neilikka');

    // Tarkista yhteys
    if ($db->connect_error) {
        die("Yhteys epäonnistui: " . $db->connect_error);
    }

    // Hae token URL-parametrista
    $token = $_GET['token'];

    // Tarkista, onko token voimassa ja sopii käyttäjälle
    $query = "SELECT * FROM resetpassword_tokens WHERE token = ? AND voimassa > NOW()";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $users_id = $row['users_id'];

        // Hae salasana lomakkeelta
        $new_password = $_POST['salasana'];

        // Tarkista, että uusi salasana täyttää vaatimukset
        if (strlen($new_password) >= 8) {
            // Muuta uusi salasana hashiksi
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Päivitä käyttäjän salasana tietokantaan
            $update_query = "UPDATE users SET password = ? WHERE id = ?";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->bind_param('si', $hashed_password, $users_id);
            $update_stmt->execute();

            // Poista token tietokannasta
            $delete_query = "DELETE FROM resetpassword_tokens WHERE token = ?";
            $delete_stmt = $db->prepare($delete_query);
            $delete_stmt->bind_param('s', $token);
            $delete_stmt->execute();

            // Ohjaa käyttäjä kirjautumissivulle
            header("Location: kirjaudu-bootstrap.php");
        } else {
            echo "Salasanan tulee olla vähintään 8 merkkiä pitkä";
        }
    } else {
        echo "Virheellinen tai vanhentunut token";
    }
}
