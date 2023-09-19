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
    <h2 class="mb-3">Liity mukaan!</h2>
    <form class="needs-validation" novalidate="" method="post" action="rekisteroidy.php">
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="firstName" class="form-label">Etunimi</label>
          <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" />
          <div class="invalid-feedback">Täytä tämä kenttä</div>
        </div>

        <div class="col-sm-6">
          <label for="lastName" class="form-label">Sukunimi</label>
          <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" />
          <div class="invalid-feedback">Täytä tämä kenttä</div>
        </div>

        <div class="col-12">
          <label for="username" class="form-label">Käyttäjänimi</label>
          <div class="input-group has-validation">
            <span class="input-group-text">@</span>
            <input type="text" class="form-control" id="username" placeholder="Käyttäjänimi" required="" />
            <div class="invalid-feedback">Tämä on pakollinen</div>
          </div>
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Luo salasana</label>
          <input type="password" class="form-control" id="password" placeholder="Salasana" required="" />
          <div class="invalid-feedback">Luo Salasana</div>
        </div>

        <div class="col-12">
          <label for="email" class="form-label">Sähköpostiosoite
            <span class="text-body-secondary">(Valinnainen)</span></label>
          <input type="email" class="form-control" id="email" placeholder="matti@meikalainen.fi" />
          <div class="invalid-feedback">Lisää sähköpostiosoite</div>
        </div>

        <div class="col-sm-7">
          <label for="address" class="form-label">Osoite</label>
          <input type="text" class="form-control" id="address" placeholder="Akonmäentie 26 A" required="" />
          <div class="invalid-feedback">Lisää osoitteesi</div>
        </div>

        <div class="col-sm-5">
          <label for="address2" class="form-label">Asunnonnumero
            <span class="text-body-secondary">(Valinnainen)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="46" />
        </div>

        <div class="col-md-5">
          <label for="country" class="form-label">Maa</label>
          <select class="form-select" id="country" required="">
            <option value="">Valitse...</option>
            <option>Suomi</option>
          </select>
          <div class="invalid-feedback">Valitse maa</div>
        </div>

        <div class="col-md-4">
          <label for="state" class="form-label">Maakunta</label>
          <select class="form-select" id="state" required="">
            <option value="">Valitse...</option>
            <option>Uusimaa</option>
          </select>
          <div class="invalid-feedback">Valitse maakunta</div>
        </div>

        <div class="col-md-3">
          <label for="zip" class="form-label">Postinumero</label>
          <input type="text" class="form-control" id="zip" placeholder="" required="" />
          <div class="invalid-feedback">Postinumero on pakollinen</div>
        </div>
      </div>

      <h4 class="mb-3 mt-5">Maksutapa</h4>

      <div class="col-md-5">
        <label for="maksutapa" class="form-label">Maksutapa</label>
        <select class="form-select" id="maksutapa" required="">
          <option value="">Valitse...</option>
          <option>Sampo</option>
          <option>Nordea</option>
          <option>Osuuspankki</option>
          <option>Aktia</option>
        </select>
        <div class="invalid-feedback">Valitse maa</div>
      </div>

      <div class="col-sm-12">
        <label for="palaute" class="form-label mt-3">Anna palautetta</label>
        <textarea type="text" class="form-control" rows="4" id="palaute" placeholder="" value="" required="">
          </textarea>
        <div class="invalid-feedback">Täytä tämä kenttä</div>
      </div>

      <div class="my-3">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="ehdot" />
          <label class="form-check-label" for="ehdot">Olen lukenut ja hyväksyn tuotteiden toimitusehdot.</label>
        </div>
      </div>

      <hr class="my-4" />

      <button class="w-100 btn btn-primary btn-lg" type="submit">
        Liity mukaan
      </button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>