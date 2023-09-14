<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elokuvahaku</title>
</head>

<body>
    <h1>Elokuvahaku</h1>
    <form method="POST" action="haku.php">
        <label for="elokuvan_nimi">Hae elokuva nimellä: </label>
        <input type="text" name="elokuvan_nimi" id="elokuvan_nimi" required>
        <button type="submit">Hae</button>
    </form>
</body>

</html>