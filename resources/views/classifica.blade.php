<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2021</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css?n=1.01">
  <link rel="stylesheet" href="/css/classifica.css?n=1.02">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />

</head>

<body>

  <!----NAVBAR --->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="/">
      <img src="/element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link active" href="/classifica">Classifica</a>
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

        <div class="carousel-item active" style="background-image: url(/img/img4.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <div class="carousel-item" style="background-image: url(/img/img3.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img2.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img1.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img5.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img6.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img7.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" style="background-image: url(/img/img8.jpg)">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <!-- button per classifiche -->
        <div class="container_btn">
          <!-- Button Classifica generale -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificagenerale" id="class_gen">
            <div>
              <img src="/img/class_1.jpg">
              <div>
                <div>Classifica Generale</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pagelle -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificapagelle" id="class_pag">
            <div>
              <img src="/img/class_2.jpg">
              <div>
                <div>Classifica Pagelle</div>
              </div>
            </div>
          </button>
          <!-- Button Classifica Pronostici -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclassificapronostici" id="class_pron">
            <div>
              <img src="/img/class_3.jpg">
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
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($primoG); ?>" name="chart<?= e($primoG); ?>"><img src="/element/chart.png"></button><?= e($primoG); ?></td>
                      <td><?= e($primoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($secondoG); ?>" name="chart<?= e($secondoG); ?>"><img src="/element/chart.png"></button><?= e($secondoG); ?></td>
                      <td><?= e($secondoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($terzoG); ?>" name="chart<?= e($terzoG); ?>"><img src="/element/chart.png"></button><?= e($terzoG); ?></td>
                      <td><?= e($terzoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quartoG); ?>" name="chart<?= e($quartoG); ?>"><img src="/element/chart.png"></button><?= e($quartoG); ?></td>
                      <td><?= e($quartoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quintoG); ?>" name="chart<?= e($quintoG); ?>"><img src="/element/chart.png"></button><?= e($quintoG); ?></td>
                      <td><?= e($quintoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($sestoG); ?>" name="chart<?= e($sestoG); ?>"><img src="/element/chart.png"></button><?= e($sestoG); ?></td>
                      <td><?= e($sestoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($settimoG); ?>" name="chart<?= e($settimoG); ?>"><img src="/element/chart.png"></button><?= e($settimoG); ?></td>
                      <td><?= e($settimoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($ottavoG); ?>" name="chart<?= e($ottavoG); ?>"><img src="element/chart.png"></button><?= e($ottavoG); ?></td>
                      <td><?= e($ottavoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($nonoG); ?>" name="chart<?= e($nonoG); ?>"><img src="element/chart.png"></button><?= e($nonoG); ?></td>
                      <td><?= e($nonoGPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($decimoG); ?>" name="chart<?= e($decimoG); ?>"><img src="element/chart.png"></button><?= e($decimoG); ?></td>
                      <td><?= e($decimoGPt); ?></td>
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
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($primoPg); ?>" name="chart<?= e($primoPg); ?>"><img src="element/chart.png"></button><?= e($primoPg); ?></td>
                      <td><?= e($primoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($secondoPg); ?>" name="chart<?= e($secondoPg); ?>"><img src="element/chart.png"></button><?= e($secondoPg); ?></td>
                      <td><?= e($secondoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($terzoPg); ?>" name="chart<?= e($terzoPg); ?>"><img src="element/chart.png"></button><?= e($terzoPg); ?></td>
                      <td><?= e($terzoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quartoPg); ?>" name="chart<?= e($quartoPg); ?>"><img src="element/chart.png"></button><?= e($quartoPg); ?></td>
                      <td><?= e($quartoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quintoPg); ?>" name="chart<?= e($quintoPg); ?>"><img src="element/chart.png"></button><?= e($quintoPg); ?></td>
                      <td><?= e($quintoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($sestoPg); ?>" name="chart<?= e($sestoPg); ?>"><img src="element/chart.png"></button><?= e($sestoPg); ?></td>
                      <td><?= e($sestoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($settimoPg); ?>" name="chart<?= e($settimoPg); ?>"><img src="element/chart.png"></button><?= e($settimoPg); ?></td>
                      <td><?= e($settimoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($ottavoPg); ?>" name="chart<?= e($ottavoPg); ?>"><img src="element/chart.png"></button><?= e($ottavoPg); ?></td>
                      <td><?= e($ottavoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($nonoPg); ?>" name="chart<?= e($nonoPg); ?>"><img src="element/chart.png"></button><?= e($nonoPg); ?></td>
                      <td><?= e($nonoPgPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($decimoPg); ?>" name="chart<?= e($decimoPg); ?>"><img src="element/chart.png"></button><?= e($decimoPg); ?></td>
                      <td><?= e($decimoPgPt); ?></td>
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
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($primoP); ?>" name="chart<?= e($primoP); ?>"><img src="element/chart.png"></button><?= e($primoP); ?></td>
                      <td><?= e($primoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">2</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($secondoP); ?>" name="chart<?= e($secondoP); ?>"><img src="element/chart.png"></button><?= e($secondoP); ?></td>
                      <td><?= e($secondoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">3</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($terzoP); ?>" name="chart<?= e($terzoP); ?>"><img src="element/chart.png"></button><?= e($terzoP); ?></td>
                      <td><?= e($terzoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">4</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quartoP); ?>" name="chart<?= e($quartoP); ?>"><img src="element/chart.png"></button><?= e($quartoP); ?></td>
                      <td><?= e($quartoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">5</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($quintoP); ?>" name="chart<?= e($quintoP); ?>"><img src="element/chart.png"></button><?= e($quintoP); ?></td>
                      <td><?= e($quintoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">6</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($sestoP); ?>" name="chart<?= e($sestoP); ?>"><img src="element/chart.png"></button><?= e($sestoP); ?></td>
                      <td><?= e($sestoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">7</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($settimoP); ?>" name="chart<?= e($settimoP); ?>"><img src="element/chart.png"></button><?= e($settimoP); ?></td>
                      <td><?= e($settimoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">8</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($ottavoP); ?>" name="chart<?= e($ottavoP); ?>"><img src="element/chart.png"></button><?= e($ottavoP); ?></td>
                      <td><?= e($ottavoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">9</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($nonoP); ?>" name="chart<?= e($nonoP); ?>"><img src="element/chart.png"></button><?= e($nonoP); ?></td>
                      <td><?= e($nonoPPt); ?></td>
                    </tr>
                    <tr>
                      <th class="colonna" scope="row">10</th>
                      <td><button type="button" data-bs-toggle="modal" class="chart" data-bs-target="#modalchart<?= e($decimoP); ?>" name="chart<?= e($decimoP); ?>"><img src="element/chart.png"></button><?= e($decimoP); ?></td>
                      <td><?= e($decimoPPt); ?></td>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn-close btn-modal-chart" data-bs-dismiss="modal" aria-label="Close"></button>
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




  <!--- script risorse per grafici --->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
  <script src="/js/chart.js?n=1.1221"></script>

  <!--Script per grafici -->
  <script>
    /*script dario*/
    var elem_dario = <?= $Dario; ?>;
    var values = elem_dario.map(function(e) {
      return e.punti;
    });
    var values_pron = elem_dario.map(function(e) {
      return e.punti_pron;
    });
    var values_pag = elem_dario.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_dario, values);

    /*script gianpaolo*/
    var elem_gianpaolo = <?= $gianpaolo ?>;
    var values1 = elem_gianpaolo.map(function(e) {
      return e.punti;
    });
    var values_pron1 = elem_gianpaolo.map(function(e) {
      return e.punti_pron;
    });
    var values_pag1 = elem_gianpaolo.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_gianpaolo, values1);
    /*script oliver*/
    var elem_oliver = <?= $Oliver ?>;
    var values2 = elem_oliver.map(function(e) {
      return e.punti;
    });
    var values_pron2 = elem_oliver.map(function(e) {
      return e.punti_pron;
    });
    var values_pag2 = elem_oliver.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_oliver, values2);
    /*script ciccio*/
    var elem_ciccio = <?= $Ciccio ?>;
    var values3 = elem_ciccio.map(function(e) {
      return e.punti;
    });
    var values_pron3 = elem_ciccio.map(function(e) {
      return e.punti_pron;
    });
    var values_pag3 = elem_ciccio.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_ciccio, values3);
    /*script luca*/
    var elem_luca = <?= $SpiritoBlu ?>;
    var values4 = elem_luca.map(function(e) {
      return e.punti;
    });
    var values_pron4 = elem_luca.map(function(e) {
      return e.punti_pron;
    });
    var values_pag4 = elem_luca.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_luca, values4);
    /*script Toto*/
    var elem_toto = <?= $Toto ?>;
    var values5 = elem_toto.map(function(e) {
      return e.punti;
    });
    var values_pron5 = elem_toto.map(function(e) {
      return e.punti_pron;
    });
    var values_pag5 = elem_toto.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_toto, values5);
    /*script pino*/
    var elem_pino = <?= $pinguinoSquadracorse ?>;
    var values6 = elem_pino.map(function(e) {
      return e.punti;
    });
    var values_pron6 = elem_pino.map(function(e) {
      return e.punti_pron;
    });
    var values_pag6 = elem_pino.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_pino, values6);
    /*script andrea*/
    var elem_andrea = <?= $Andrea ?>;
    var values7 = elem_andrea.map(function(e) {
      return e.punti;
    });
    var values_pron7 = elem_andrea.map(function(e) {
      return e.punti_pron;
    });
    var values_pag7 = elem_andrea.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_andrea, values7);
    /*script alessioC*/
    var elem_alessioc = <?= $Ermenegildo ?>;
    var values8 = elem_alessioc.map(function(e) {
      return e.punti;
    });
    var values_pron8 = elem_alessioc.map(function(e) {
      return e.punti_pron;
    });
    var values_pag8 = elem_alessioc.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_alessioc, values8);
    /*script alessioD*/
    var elem_alessiod = <?= $alessiodom97 ?>;
    var values9 = elem_alessiod.map(function(e) {
      return e.punti;
    });
    var values_pron9 = elem_alessiod.map(function(e) {
      return e.punti_pron;
    });
    var values_pag9 = elem_alessiod.map(function(e) {
      return e.punti_pag;
    });
    addData(chart_alessiod, values9);

    function update_class_gen() {
      updateData(chart_dario, values);
      updateData(chart_gianpaolo, values1);
      updateData(chart_oliver, values2);
      updateData(chart_ciccio, values3);
      updateData(chart_luca, values4);
      updateData(chart_toto, values5);
      updateData(chart_pino, values6);
      updateData(chart_andrea, values7);
      updateData(chart_alessioc, values8);
      updateData(chart_alessiod, values9);
    }

    function update_class_pron() {
      updateData(chart_dario, values_pron);
      updateData(chart_gianpaolo, values_pron1);
      updateData(chart_oliver, values_pron2);
      updateData(chart_ciccio, values_pron3);
      updateData(chart_luca, values_pron4);
      updateData(chart_toto, values_pron5);
      updateData(chart_pino, values_pron6);
      updateData(chart_andrea, values_pron7);
      updateData(chart_alessioc, values_pron8);
      updateData(chart_alessiod, values_pron9);
    }

    function update_class_pag() {
      updateData(chart_dario, values_pag);
      updateData(chart_gianpaolo, values_pag1);
      updateData(chart_oliver, values_pag2);
      updateData(chart_ciccio, values_pag3);
      updateData(chart_luca, values_pag4);
      updateData(chart_toto, values_pag5);
      updateData(chart_pino, values_pag6);
      updateData(chart_andrea, values_pag7);
      updateData(chart_alessioc, values_pag8);
      updateData(chart_alessiod, values_pag9);
    }

    document.getElementById("class_pron").addEventListener("click", update_class_pron);
    document.getElementById("class_pag").addEventListener("click", update_class_pag);
    document.getElementById("class_gen").addEventListener("click", update_class_gen);
  </script>

  <!--Script bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>