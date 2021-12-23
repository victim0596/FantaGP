<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2021</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css?n=1.022">
  <link rel="stylesheet" href="./css/stat.css?n=1.104">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="./logo.ico" />
  <link rel="icon" sizes="192x192" href="applogo.png">
  <link rel="apple-touch-icon" sizes="128x128" href="applogo.png">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="./">
      <img src="./element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="./">Home</a>
        <a class="nav-link" href="./classifica">Classifica</a>
        <a class="nav-link active" href="./statistiche">Statistiche</a>
        <a class="nav-link" href="./pronostici">Pronostici</a>
        <<?php if (isset($sessionUser)) { ?> <a class="nav-link" href="./profilo"><?= e($sessionUser); ?></a>
        <?php } else { ?>
          <a class="nav-link" href="./login">Login</a><?php } ?>
      </div>
    </div>
  </nav>


  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="buttondiv" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <img src="./element/down-chevron.png">
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        </div>
      </div>
    </div>
  </div>


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
        <div class="row contStat">
          <div class="col">
            <div class="col stat">
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <defs>
                      <linearGradient spreadMethod="pad" id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                        <stop offset="0%" style="stop-color:rgb(0,255,235);stop-opacity:1.00" />
                        <stop offset="100%" style="stop-color:rgb(7,58,187);stop-opacity:1.00" />
                      </linearGradient>
                    </defs>
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
                  </svg>
                </div>

                <div class="col">Pronostici gara indovinati</div>
              </div>
              <div class="row p-2 contPtMax">
                <div class="col-2 ptMax">0pt</div>
                <div class="col">Gara con piu punti</div>
                <div class="tooltipPtMax">
                  <img src="" alt="" class="tooltipPtMaxImgStato">
                  <div class="tooltipPtMaxCircuito"></div>
                </div>
              </div>
              <div class="row p-2 contPtMin">
                <div class="col-2 ptMin">0pt</div>
                <div class="col">Gara con meno punti</div>
                <div class="tooltipPtMin">
                  <img src="" alt="" class="tooltipPtMinImgStato">
                  <div class="tooltipPtMinCircuito"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="col stat">
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
                  </svg>
                </div>
                <div class="col">Pronostici Qualifiche indovinati</div>
              </div>
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
                  </svg>
                </div>
                <div class="col">N.ritirati indovinati</div>
              </div>
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
                  </svg>
                </div>
                <div class="col">VSC indovinata</div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="col stat">
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
                  </svg>
                </div>
                <div class="col">Giro Veloce indovinati</div>
              </div>
              <div class="row p-2">
                <div class="col-2">
                  <span class="valorePerc">0%</span>
                  <svg height="200" width="200">
                    <circle class="circle" cx="100" cy="100" r="30" stroke="url(#gradient)" stroke-width="5px" fill-opacity="0" />
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
  <script src="./js/statistiche.js"></script>
  <script src="./js/circleAnim.js?n=1"></script>
  <script src="./js/tooltipAni.js?n=0.1"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>