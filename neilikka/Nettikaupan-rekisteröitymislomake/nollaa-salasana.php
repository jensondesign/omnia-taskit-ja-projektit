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
    <!-- Lisää alla oleva lomake resetpassword.php-tiedostoon -->
    <div class="col-sm-12 col-md-9 col-xl-8 col-xxl-6 px-3 my-5 mx-auto">

        <h2 class="mb-3">Nollaa Salasana</h2>
        <form class="needs-validation" novalidate="" method="post" action="kasittelija_resetpassword.php">

            <div class="col-12">
                <label for="new_password" class="form-label">Uusi Salasana</label>
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Uusi salasana" required="" />
                <div class="invalid-feedback">Tämä on pakollinen</div>
            </div>

            <div class="col-12 my-3">
                <label for="confirm_password" class="form-label">Vahvista Uusi Salasana</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Vahvista uusi salasana" required="" />
                <div class="invalid-feedback">Salasanat eivät täsmää</div>
            </div>

            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>" />

            <hr class="my-4" />

            <button class="w-100 btn btn-primary btn-lg" type="submit">
                Tallenna Uusi Salasana
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>