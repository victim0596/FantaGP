<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2022</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css?n=1.03">
  <link rel="stylesheet" href="./css/classifica.css?n=1.02">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />

</head>

<body>

  <!----NAVBAR --->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="./">
      <img src="./element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="./">Home</a>
        <a class="nav-link active" href="./classifica">Classifica</a>
        <a class="nav-link" href="./statistiche">Statistiche</a>
        <a class="nav-link" href="./pronostici">Pronostici</a>
        <?php if (isset($sessionUser)) { ?>
          <a class="nav-link" href="./profilo"><?= e($sessionUser); ?></a>
        <?php } else { ?>
          <a class="nav-link" href="./login">Login</a><?php } ?>
        <?php if (isset($sessionAdmin)) { ?>
          <a class="nav-link" href="./admin">Admin</a>
        <?php } ?>
      </div>
    </div>
  </nav>
  <!---- CAROUSEL --->
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url(./img/img4.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(./img/img3.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img2.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img1.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img5.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img6.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img7.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(./img/img8.jpg?v=1.0)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <!-- button per classifiche -->
        <div class="container_btn">
          <!-- Button Classifica generale -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassifica" id="class_gen">
            <div>
              <img src="./img/class_1.jpg">
              <div>
                <div>Classifica Generale</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pagelle -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassifica" id="class_pag">
            <div>
              <img src="./img/class_2.jpg">
              <div>
                <div>Classifica Pagelle</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pronostici -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassifica" id="class_pron">
            <div>
              <img src="./img/class_3.jpg">
              <div>
                <div>Classifica Pronostici</d>
                </div>
              </div>
          </button>
        </div>

        <!-- Modal TABLE CLASSIFICA -->
        <div class="modal fade" id="modalclassifica" tabindex="-1" aria-labelledby="modalclassifica" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal_table">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitoloClassifica">Classifica Generale</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="row headerClassifica">
                        <div class="headerText">FANTAGP2022</div>
                      </div>
                      <div class="row row2Class row-cols-2">
                        <div class="col bestSection">
                          <div class="headerText headerBest">BEST</div>
                          <img class="imgBest" src="img/piloti/Sainz.png" alt="">
                        </div>
                        <div class="col tabCol">
                          <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                              <?php for($i=0; $i<10; $i++){?>
                              <tr>
                                <th class="colonna" scope="row"><?= e($i+1) ?></th>
                                <td class="nameDriver"><span>I</span>NULL</td>
                                <td><img src="img/scuderie/scuderieClassifica/Alpine.png" class="logoScuderia" alt=""></td>
                                <td class="ptDriver">0</td>
                                <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart" name="modalchart"><img src="element/chart.png"></button></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row headerClassifica remHeader">
                        <div class="headerText">_</div>
                      </div>
                      <div class="row row2Class"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        

        <!-- TABLE -->

        <!-- Modal Chart -->
        <div class="modal fade" id="modalchart" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartTitle">Andamento punti per gara </h5>
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="chart" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>




  <!--- script risorse per grafici --->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
  
   <!--Script per cambiamenti grafici -->
   <script src="./js/classificaEstetica.js"></script>
  <!--Script per caricamento dati classifiche -->
  <script src="./js/classificaDati.js"></script>
  <!--Script per i chart -->
  <script src="./js/chart.js?n=1.1221"></script>

 


  <!--Script bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>