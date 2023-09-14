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

// Haku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elokuvan_nimi = $_POST["elokuvan_nimi"];

    // Lisää prosenttimerkit (%) hakusanan alkuun ja loppuun
    $elokuvan_nimi = '%' . $elokuvan_nimi . '%';

    $sql = "SELECT title, description, rating, release_year
            FROM film
            WHERE title LIKE ?";

    // Valmistelee SQL-kyselyn käyttäen valmistettuja lausuntoja
    $stmt = $conn->prepare($sql);

    // Liittää hakusanan valmisteltuun lausuntoon
    $stmt->bind_param("s", $elokuvan_nimi);

    // Suorittaa valmistellun lausunnon
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Tulostetaan jokainen tulos omalle rivilleen
        echo "<h2>Hakutulokset:</h2>";
        echo "<table border='1'>
            <tr>
                <th>Nimi</th>
                <th>Kuvaus</th>
                <th>Ikäraja</th>
                <th>Julkaisuvuosi</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["rating"] . "</td>
                    <td>" . $row["release_year"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Elokuvaa ei löytynyt.";
    }

    // Sulje valmisteltu lausunto
    $stmt->close();
}
