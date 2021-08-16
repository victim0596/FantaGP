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
  <link rel="stylesheet" href="css/stat.css">
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

<div class="container-fluid">
    <div class="row">
        <div class="col-2 colUser">
            <div class="barraLaterale">
                <div class="mb-3" name="Oliver">Oliver</div>
                <div class="mb-3" name="alessiodom97">alessiodom97</div>
                <div class="mb-3" name="Toto">Toto</div>
                <div class="mb-3" name="Ciccio">Ciccio</div>
                <div class="mb-3" name="SpiritoBlu">SpiritoBlu</div>
                <div class="mb-3" name="gianpaolo">gianpaolo</div>
                <div class="mb-3" name="pinguinoSquadraCorse">pinguinoSquadraCorse</div>
                <div class="mb-3" name="Ermenegildo">Ermenegildo</div>
                <div class="mb-3" name="Dario">Dario</div>
                <div class="mb-3" name="Andrea">Andrea</div>
            </div>
        </div>
        <div class="col">
          <div id="chartdiv"></div>
          <p id="nomeUtenteGraf"></p>
          <div class="row contStat">
            <div class="col">
              <div class="col stat">
                <div class="row">
                  <div class="col-2">25%
                  <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                  </div>
                    
                  <div class="col">Pronostici gara indovinati</div>
                </div>
                <div class="row">
                  <div class="col-2">157pt</div>
                  <div class="col">Gara con piu punti</div>
                </div>
                <div class="row">
                  <div class="col-2">85pt</div>
                  <div class="col">Gara con meno punti</div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="col stat">
                  <div class="row">
                    <div class="col-2">15%
                    <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                    </div>
                    <div class="col">Pronostici Qualifiche indovinati</div>
                  </div>
                  <div class="row">
                    <div class="col-2">2%
                    <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                    </div>
                    <div class="col">N.ritirati indovinati</div>
                  </div>
                  <div class="row">
                    <div class="col-2">80%
                    <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                    </div>
                    <div class="col">VSC indovinata</div>
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="col stat">
                  <div class="row">
                    <div class="col-2">5%
                    <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                    </div>
                    <div class="col">Giro Veloce indovinati</div>
                  </div>
                  <div class="row">
                    <div class="col-2">90%
                    <svg height="200" width="200">
                      <circle class="circle" cx="100" cy="100" r="35" stroke="red" stroke-width="5px" fill-opacity="0" />
                    </svg>
                    </div>
                    <div class="col">SC indovinata</div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Per la mappa -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<?php include 'map.php' ?>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>