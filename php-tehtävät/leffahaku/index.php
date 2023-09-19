<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leffahaku</title>
</head>

<body>
    <h1>Leffahaku</h1>
    <form method="POST" action="haku.php">
        <label for="elokuvan_nimi">Hae leffa nimellä:</label>
        <input type="text" name="elokuvan_nimi" id="elokuvan_nimi">

        <br><br>

        <label for="genre">Valitse genre:</label>
        <select name="genre" id="genre">
            <option value="">All</option>
            <option value="action">Action</option>
            <option value="animation">Animation</option>
            <option value="children">Children</option>
            <option value="classics">Classics</option>
            <option value="comedy">Comedy</option>
            <option value="documentary">Documentary</option>
            <option value="drama">Drama</option>
            <option value="family">Family</option>
            <option value="foreign">Foreign</option>
            <option value="games">Games</option>
            <option value="horror">Horror</option>
            <option value="music">Music</option>
            <option value="new">New</option>
            <option value="sci-fi">Sci-Fi</option>
            <option value="sports">Sports</option>
            <option value="travel">Travel</option>
        </select>

        <button type="submit">Hae</button>

    </form>

    <br><br><br>

    <h2>Lisää elokuva</h2>
    <form method="POST" action="tallenna_elokuva.php">
        <label for="nimi">Nimi:</label>
        <input type="text" name="nimi" id="nimi" required>

        <br><br>

        <label for="kuvaus">Kuvaus:</label><br>
        <textarea name="kuvaus" id="kuvaus" cols="30" rows="10" required></textarea>

        <br><br>

        <label for="julkaisuvuosi">Julkaisuvuosi:</label>
        <input type="number" name="julkaisuvuosi" id="julkaisuvuosi" required>

        <br><br>

        <label for="kieli">Kieli:</label>
        <select name="kieli" id="kieli" required>
            <option value="1">Englanti</option>
            <option value="2">Italian</option>
            <option value="3">Japanese</option>
            <option value="4">Mandarin</option>
            <option value="5">French</option>
            <option value="6">German</option>
        </select>

        <br><br>

        <label for="kesto">Kesto (minuutteina):</label>
        <input type="number" name="kesto" id="kesto" required>

        <br><br>

        <label for="ikaraja">Ikäraja:</label>
        <select name="ikaraja" id="ikaraja" required>
            <option value="g">G</option>
            <option value="pg">PG</option>
            <option value="pg">PG-13</option>
            <option value="pg">R</option>
            <option value="pg">NC-17</option>
            <option value="pg">NC-17</option>
        </select>

        <br><br>

        <label for="genre">Genre:</label>
        <select name="genre" id="genre" required>
            <option value="1">Action</option>
            <option value="2">Animation</option>
            <option value="3">Children</option>
            <option value="4">Classics</option>
            <option value="5">Comedy</option>
            <option value="6">Documentary</option>
            <option value="7">Drama</option>
            <option value="8">Family</option>
            <option value="9">Foreign</option>
            <option value="10">Games</option>
            <option value="11">Horror</option>
            <option value="12">Music</option>
            <option value="13">New</option>
            <option value="14">Sci-Fi</option>
            <option value="15">Sports</option>
            <option value="16">Travel</option>

        </select>

        <br><br>

        <label for="vuokra-aika">Vuokra-aika:</label>
        <input type="number" name="vuokra-aika" id="vuokra-aika" required>

        <br><br>

        <label for="vuokrahinta">Vuokrahinta:</label>
        <input type="number" name="vuokrahinta" id="vuokrahinta" step="0.01" required>

        <br><br>

        <label for="korvaushinta">Korvaushinta:</label>
        <input type="number" name="korvaushinta" id="korvaushinta" step="0.01" required>

        <br><br>

        <label>Special Features:</label><br>
        <input type="checkbox" name="special_features[]" value="Trailers">Trailers<br>
        <input type="checkbox" name="special_features[]" value="Commentaries">Commentaries<br>
        <input type="checkbox" name="special_features[]" value="Deleted Scenes">Deleted Scenes<br>
        <input type="checkbox" name="special_features[]" value="Behind the Scenes">Behind the Scenes<br>

        <br><br>
        <button type="submit">Lisää elokuva</button>
    </form>
</body>

</html>