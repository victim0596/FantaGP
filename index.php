<?php session_start()?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>FantaGP 2021</title>
	<meta name="description" content="Sito per il fantaGP">
	<meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css?n=1.022">
  <link rel="stylesheet" href="css/animation_home.css">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <link rel="shortcut icon" href="/logo.ico" />
    <link rel="icon" sizes="192x192" href="applogo.png">
    <link rel="apple-touch-icon" sizes="128x128" href="applogo.png">

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <a class="navbar-brand" href="index.php">
      <img src="element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
      </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="index.php">Home</a>
      <a class="nav-link" href="classifica.php">Classifica</a>
      <a class="nav-link" href="partecipanti.php">Partecipanti</a>
      <a class="nav-link" href="punteggi.php">Punteggi per gara</a>
      <a class="nav-link" href="pronostici.php">Pronostici</a>
      <?php if (isset($_SESSION['session_id'])) {?>
    <a class="nav-link" href="profilo.php"><?php echo $_SESSION['session_user']; ?></a>
     <?php } else {?>
      <a class="nav-link" href="login.php">Login</a><?php }?>
    </div>
  </div>
</nav>
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

      <div class="timer_quali">
        <h3>TEMPO RIMANENTE QUALIFICHE</h3>
        <div class="timer row">
          <span class="col" id="giorni">00</span>
          <span class="col" id="ore">00</span>
          <span class="col" id="minuti">00</span>
          <span class="col" id="secondi">00</span><br>
          </div>
          <div class="type row">
            <span class="col">GIORNI</span>
            <span class="col">ORE</span>
            <span class="col">MINUTI</span>
            <span class="col sec">SECONDI</span>
          </div>
    </div>
    <div class="timer_gara">
        <h3>TEMPO RIMANENTE GARA</h3>
        <div class="timer row">
          <span class="col" id="giornig">00</span>
          <span class="col" id="oreg">00</span>
          <span class="col" id="minutig">00</span>
          <span class="col" id="secondig">00</span><br>
         </div>
         <div class="type row">
          <span class="col">GIORNI</span>
          <span class="col">ORE</span>
          <span class="col">MINUTI</span>
          <span class="col sec">SECONDI</span>
        </div>
    </div>
  <h1 data-text="fantagp2021"><span>fantagp2021</span></h1>
  <h1 data-text="design by Terzo Oliver" class="design"><span>design by Terzo Oliver</span></h1>

    </div>
  </div>

</header>



  <script src="js/main.js?n=1.040"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>