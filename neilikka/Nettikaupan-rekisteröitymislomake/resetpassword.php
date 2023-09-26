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
        <form class="needs-validation" novalidate="" method="post" action="Nettikaupan-rekisteröitymislomake/kasittelija_resetpassword.php">

            <div class="col-12">
                <label for="email" class="form-label">Sähköpostiosoite</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Sähköpostiosoite" required="" />
                <div class="invalid-feedback">Tämä on pakollinen</div>
            </div>

            <hr class="my-4" />

            <button class="w-100 btn btn-primary btn-lg" type="submit">
                Lähetä Nollauslinkki
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>