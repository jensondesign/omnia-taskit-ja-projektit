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

        <label for="genre">Valitse genre:</label>
        <select name="genre" id="genre">
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
</body>

</html>