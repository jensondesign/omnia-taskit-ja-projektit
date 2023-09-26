<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <title>Bootstrap lomake</title>
</head>

<body>
    <div class="col-sm-12 col-md-9 col-xl-8 col-xxl-6 px-3 my-5 mx-auto">
        <h2 class="mb-3">Kirjaudu sisään</h2>
        <form class="needs-validation" novalidate="" method="post" action="kirjaudu.php">

            <div class="col-12">
                <label for="username" class="form-label">Käyttäjänimi tai sähköpostiosoite</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" name="username" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|[a-zA-Z0-9_]{3,20}" placeholder="Käyttäjänimi" required="" />
                    <div class="invalid-feedback">Tämä on pakollinen</div>
                </div>
            </div>

            <div class="col-12 my-3">
                <label for="password" class="form-label">Salasana</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Salasana" required="" />
                <div class="invalid-feedback">Salasana on virheellinen</div>
            </div>

            <!-- Salasanan nollaus linkki -->
            <div class="col-12 my-3">
                <a href="resetpassword.php">Unohditko salasanasi?</a>
            </div>

            <hr class="my-4" />

            <button class="w-100 btn btn-primary btn-lg" type="submit">
                Kirjaudu sisään
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>