<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2021</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css?n=1.03">
  <link rel="stylesheet" href="css/login.css?n=1.02">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />

</head>

<body>

  <!----NAVBAR --->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="/">
      <img src="element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link" href="/classifica">Classifica</a>
        <a class="nav-link" href="/statistiche">Statistiche</a>
        <a class="nav-link" href="/pronostici">Pronostici</a>
        <?php if (isset($sessionUser)) { ?>
          <a class="nav-link" href="/profilo"><?= e($sessionUser); ?></a>
        <?php } else { ?>
          <a class="nav-link" href="/login">Login</a><?php } ?>
      </div>
    </div>
  </nav>
  <!---- CAROUSEL --->
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url(img/img4.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img3.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img2.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img1.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img5.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img6.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img7.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(img/img8.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <div class="form_login container">
          <form class="px-4 py-3" method="post" action="">
            @csrf
            <div class="mb-3">
              <label for="n_utente">Nome Utente</label>
              <input type="text" class="form-control" id="n_utente" name="n_utente" placeholder="Nome utente">
            </div>
            <div class="mb-3">
              <label for="psw">Password</label>
              <input type="password" class="form-control" id="psw" name="psw" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="registrazione.html">Registrati</a>
          <!-- simboli messaggi -->
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
          </svg>
          <!-- Alert -->

          <div class="alert alert-primary d-flex align-items-center classAlert" id="alert" role="alert">
            <div class="textProfile" id="txtAlert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#check-circle-fill" id="simbolID" />
              </svg>
              <?= e($text); ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="btnAlert"></button>
          </div>
        </div>


      </div>
    </div>
  </header>


  <script src="js/Alert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>