<!DOCTYPE html>
<html lang="fi">

<head>
    <!-- Sisällytä tarvittavat tietokantayhteyksiin liittyvät tiedostot -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <title>Salasanan Nollaus</title>
</head>

<body>
    <div class="col-sm-12 col-md-9 col-xl-8 col-xxl-6 px-3 my-5 mx-auto">
        <h2 class="mb-3">Salasanan Nollaus</h2>
        <form method="post" action="kasittelija_resetpassword.php">
            <label for="salasana">Uusi salasana:</label>
            <input type="password" name="salasana" required><br><br>
            <label for="salasana_uudestaan">Kirjoita uusi salasana uudelleen:</label>
            <input type="password" name="salasana_uudestaan" required><br><br>
            <input type="submit" name="nollaa" value="Nollaa salasana">
        </form>
        <hr class="my-4" />
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>