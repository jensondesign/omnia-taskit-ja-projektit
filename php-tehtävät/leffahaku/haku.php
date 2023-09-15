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

// Tarkistetaan, onko lomakkeelta saatu hakusana ja genre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elokuvan_nimi = $_POST["elokuvan_nimi"];
    $genre = $_POST["genre"];

    // Voit lisätä sekä hakusanan että genren käyttöä varten tietokantakyselyyn
    if (empty($genre)) {
        $sql = "SELECT film.title, film.description, film.rating, film.release_year
                FROM film
                WHERE film.title LIKE '%$elokuvan_nimi%'";
    } else {
        $sql = "SELECT film.title, film.description, film.rating, film.release_year
            FROM film
            WHERE film.title LIKE '%$elokuvan_nimi%'
            AND film.film_id IN (
                SELECT film_id
                FROM film_category
                WHERE category_id = (
                    SELECT category_id
                    FROM category
                    WHERE name = '$genre'
                )
            )";
    }
    
    $result = $conn->query($sql);

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
}
