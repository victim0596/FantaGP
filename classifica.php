<?php
include 'load_classifica.php';
?>


<?php session_start() ?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2021</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css?n=1.01">
  <link rel="stylesheet" href="css/classifica.css?n=1.02">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />

</head>

<body>

  <!----NAVBAR --->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="index.php">
      <img src="element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link active" href="classifica.php">Classifica</a>
        <a class="nav-link" href="partecipanti.php">Partecipanti</a>
        <a class="nav-link" href="statistiche.php">Statistiche</a>
        <a class="nav-link" href="pronostici.php">Pronostici</a>
        <?php if (isset($_SESSION['session_id'])) { ?>
          <a class="nav-link" href="profilo.php"><?php echo $_SESSION['session_user']; ?></a>
        <?php } else { ?>
          <a class="nav-link" href="login.php">Login</a><?php } ?>
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

        <!-- button per classifiche -->
        <div class="container_btn">
          <!-- Button Classifica generale -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificagenerale" id="class_gen">
            <div>
              <img src="img/class_1.jpg">
              <div>
                <div>Classifica Generale</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pagelle -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificapagelle" id="class_pag">
            <div>
              <img src="img/class_2.jpg">
              <div>
                <div>Classifica Pagelle</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pronostici -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificapronostici" id="class_pron">
            <div>
              <img src="img/class_3.jpg">
              <div>
                <div>Classifica Pronostici</d>
                </div>
              </div>
          </button>
        </div>


        <!-- Modal TABLE CLASSIFICA GENERALE-->
        <div class="modal fade" id="modalclassificagenerale" tabindex="-1" aria-labelledby="modal_classifica" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal_table">
              <div class="modal-header">
                <h5 class="modal-title" id="modalclassificagenerale">Classifica</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table-responsive">
                  <thead class="barra_classifica">
                    <tr>
                      <th scope="col" style="font-size: 50px; color: rgba(201, 76, 76, 0.0);">_</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="colonna" scope="row">1</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[0]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[0]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[0]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[0]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[1]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[1]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[1]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[1]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[2]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[2]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[2]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[2]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[3]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[3]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[3]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[3]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[4]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[4]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[4]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[4]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[5]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[5]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[5]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[5]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[6]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[6]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[6]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[6]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[7]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[7]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[7]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[7]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[8]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[8]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[8]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[8]["puntiGen"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaGenerale[9]["id_p"]; ?>" name="chart<?php echo $arrayClassificaGenerale[9]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaGenerale[9]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaGenerale[9]["puntiGen"]; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal TABLE CLASSIFICA PAGELLE-->
        <div class="modal fade" id="modalclassificapagelle" tabindex="-1" aria-labelledby="modal_classifica" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal_table">
              <div class="modal-header">
                <h5 class="modal-title" id="modalclassificapagelle">Classifica Pagelle</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table-responsive">
                  <thead class="barra_classifica">
                    <tr>
                      <th scope="col" style="font-size: 50px; color: rgba(201, 76, 76, 0.0);">_</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="colonna" scope="row">1</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[0]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[0]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[0]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[0]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[1]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[1]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[1]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[1]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[2]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[2]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[2]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[2]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[3]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[3]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[3]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[3]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[4]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[4]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[4]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[4]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[5]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[5]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[5]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[5]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[6]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[6]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[6]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[6]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[7]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[7]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[7]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[7]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[8]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[8]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[8]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[8]["puntiPag"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPagelle[9]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPagelle[9]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPagelle[9]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPagelle[9]["puntiPag"]; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal TABLE CLASSIFICA PRONOSTICI-->
        <div class="modal fade" id="modalclassificapronostici" tabindex="-1" aria-labelledby="modal_classifica" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal_table">
              <div class="modal-header">
                <h5 class="modal-title" id="modalclassificapronostici">Classifica Pronostici</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table-responsive">
                  <thead class="barra_classifica">
                    <tr>
                      <th scope="col" style="font-size: 50px; color: rgba(201, 76, 76, 0.0);">_</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="colonna" scope="row">1</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[0]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[0]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[0]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[0]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[1]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[1]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[1]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[1]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[2]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[2]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[2]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[2]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[3]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[3]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[3]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[3]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[4]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[4]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[4]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[4]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[5]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[5]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[5]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[5]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[6]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[6]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[6]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[6]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[7]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[7]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[7]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[7]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[8]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[8]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[8]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[8]["puntiPron"]; ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?php echo $arrayClassificaPronostici[9]["id_p"]; ?>" name="chart<?php echo $arrayClassificaPronostici[9]["id_p"]; ?>"><img src="element/chart.png"></button><?php echo $arrayClassificaPronostici[9]["id_p"]; ?></td>
                      <td><?php echo $arrayClassificaPronostici[9]["puntiPron"]; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- TABLE -->






        <!-- Modal Chart -->

        <!-- Chart Dario -->
        <div class="modal fade" id="modalchartDario" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartDario">Andamento punti per gara Dario</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartDario" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart gianpaolo -->
        <div class="modal fade" id="modalchartgianpaolo" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartgianpaolo">Andamento punti per gara gianpaolo</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="Chartgianpaolo" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart Toto -->
        <div class="modal fade" id="modalchartToto" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartToto">Andamento punti per gara Toto</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartToto" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart Andrea -->
        <div class="modal fade" id="modalchartAndrea" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartAndrea">Andamento punti per gara Andrea</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartAndrea" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart SpiritoBlu -->
        <div class="modal fade" id="modalchartSpiritoBlu" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartSpiritoBlu">Andamento punti per gara SpiritoBlu</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartSpiritoBlu" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart Oliver -->
        <div class="modal fade" id="modalchartOliver" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartOliver">Andamento punti per gara Oliver</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartOliver" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart pinguinoSquadraCorse -->
        <div class="modal fade" id="modalchartpinguinoSquadraCorse" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartpinguinoSquadraCorse">Andamento punti per gara pinguinoSquadraCorse</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartpinguinoSquadraCorse" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart alessiodom97 -->
        <div class="modal fade" id="modalchartalessiodom97" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartalessiodom97">Andamento punti per gara alessiodom97</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="Chartalessiodom97" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart Ermenegildo -->
        <div class="modal fade" id="modalchartErmenegildo" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartErmenegildo">Andamento punti per gara Ermenegildo</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartErmenegildo" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Chart Ciccio -->
        <div class="modal fade" id="modalchartCiccio" tabindex="-1" aria-labelledby="modalchart" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalchartCiccio">Andamento punti per gara Ciccio</h5>
                <button type="button" class="btn-close btn-close-white btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <canvas id="ChartCiccio" width="400" height="400"></canvas>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
  </header>




  <!--- script per grafici --->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
  <script src="js/chart.js?n=1.1221"></script>
  <?php include 'chart.php' ?>


  <!--Script bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>