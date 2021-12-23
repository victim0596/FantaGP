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
  <script>
    var elem = <?= $arrayGara; ?>; //var che contiene i pronostici in formato json
    var risultati = <?= $arrayRisultati ?> //var che contiene i risultati delle gare in formato json

    am4core.ready(function() {

      //enable className
      am4core.options.autoSetClassName = true;


      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create map instance
      var chart = am4core.create("chartdiv", am4maps.MapChart);

      // Set map definition
      chart.geodata = am4geodata_worldLow;

      // Set projection
      chart.projection = new am4maps.projections.Miller();

      // Create map polygon series
      var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

      // Exclude Antartica
      polygonSeries.exclude = ["AQ"];

      // Make map load polygon (like country names) data from GeoJSON
      polygonSeries.useGeodata = true;

      // Configure series
      var polygonTemplate = polygonSeries.mapPolygons.template;
      polygonTemplate.tooltipText = "{name}";
      polygonTemplate.polygon.fillOpacity = 0.6;


      // Create hover state and set alternative fill color
      var hs = polygonTemplate.states.create("hover");
      hs.properties.fill = chart.colors.getIndex(0);

      // Add image series
      var imageSeries = chart.series.push(new am4maps.MapImageSeries());
      imageSeries.mapImages.template.propertyFields.longitude = "longitude";
      imageSeries.mapImages.template.propertyFields.latitude = "latitude";
      if (window.innerWidth <= 991) {
        imageSeries.mapImages.template.tooltipHTML = `
    <div class="container toolCont" style="border-bottom: 2px solid white">
        <div class="row" style="text-align: center">
            <div class="col colTooltip">
                <div>
                    <img class="imgTooltip" src="./img/bandiere/{stato}.png">
                </div>
                <div>
                    <p class="stato">{stato}</p>
                </div>
            </div>
            <div class="col colTooltip">
                <div>
                    <img class="imgTooltip" src="./img/circuiti/{title}.png">
                </div>
                <div>
                    <p class="textCircuito">{circuito}</p>
                </div>
            </div>
            </div>
    </div>
    <div class="container" style="border-bottom: white;">
        <div class="row" style="text-align: center">
            <div class="col colTooltip">
                <div style="padding: 5px">
                    <p>Punti: {punti}</p>
                </div>
                <div class="row-sm pronosticiRow">
                    <div class= "col">
                        <p>QP1</p>
                        <p>{qp1}</p>
                    </div>
                    <div class= "col">
                        <p>QP2</p>
                        <p>{qp2}</p>
                    </div>
                    <div class= "col">
                        <p>QP3</p>
                        <p>{qp3}</p>
                    </div>
                    <div class= "col">
                        <p>GP1</p>
                        <p>{gp1}</p>
                    </div>
                    <div class= "col">
                        <p>GP2</p>
                        <p>{gp2}</p>
                    </div>
                    <div class= "col">
                        <p>GP3</p>
                        <p>{gp3}</p>
                    </div>
                    <div class= "col">
                        <p>GV</p>
                        <p>{gv}</p>
                    </div>
                    <div class= "col">
                        <p>NRIT</p>
                        <p>{nrit}</p>
                    </div>
                    <div class= "col">
                        <p>SC</p>
                        <p>{sc}</p>
                    </div>
                    <div class= "col">
                        <p>VSC</p>
                        <p>{vsc}</p>
                    </div>

                </div>
            </div>
            </div>
    </div>

    `;
      } else {
        imageSeries.mapImages.template.tooltipHTML = `
    <div class="container toolCont" style="border-bottom: 2px solid white">
        <div class="row" style="text-align: center">
            <div class="col colTooltip">
                <div>
                    <img class="imgTooltip" src="./img/bandiere/{stato}.png">
                </div>
                <div>
                    <p class="stato">{stato}</p>
                </div>
            </div>
            <div class="col colTooltip">
                <div>
                    <img class="imgTooltip" src="./img/circuiti/{title}.png">
                </div>
                <div>
                    <p class="textCircuito">{circuito}</p>
                </div>
            </div>
            </div>
    </div>
    <div class="container" style="border-bottom: white;">
        <div class="row" style="text-align: center">
            <div class="col colTooltip">
                <div style="padding: 5px">
                    <p>Punti: {punti}</p>
                </div>
                <div class="row pronosticiRow">
                    <div class= "col">
                        <p>QP1</p>
                        <p>{qp1}</p>
                    </div>
                    <div class= "col">
                        <p>QP2</p>
                        <p>{qp2}</p>
                    </div>
                    <div class= "col">
                        <p>QP3</p>
                        <p>{qp3}</p>
                    </div>
                    <div class= "col">
                        <p>GP1</p>
                        <p>{gp1}</p>
                    </div>
                    <div class= "col">
                        <p>GP2</p>
                        <p>{gp2}</p>
                    </div>
                    <div class= "col">
                        <p>GP3</p>
                        <p>{gp3}</p>
                    </div>
                    <div class= "col">
                        <p>GV</p>
                        <p>{gv}</p>
                    </div>
                    <div class= "col">
                        <p>NRIT</p>
                        <p>{nrit}</p>
                    </div>
                    <div class= "col">
                        <p>SC</p>
                        <p>{sc}</p>
                    </div>
                    <div class= "col">
                        <p>VSC</p>
                        <p>{vsc}</p>
                    </div>

                </div>
            </div>
            </div>
    </div>

    `;
      }

      imageSeries.mapImages.template.propertyFields.url = "url";

      imageSeries.tooltip.getFillFromObject = false;
      imageSeries.tooltip.background.fill = am4core.color("#212129");
      imageSeries.tooltip.label.maxHeight = 150;
      imageSeries.tooltip.label.wrap = true;

      var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
      circle.radius = 3;
      circle.propertyFields.fill = "color";
      circle.nonScaling = true;

      var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
      circle2.radius = 3;
      circle2.propertyFields.fill = "color";


      circle2.events.on("inited", function(event) {
        animateBullet(event.target);
      })


      function animateBullet(circle) {
        var animation = circle.animate([{
          property: "scale",
          from: 1 / chart.zoomLevel,
          to: 5 / chart.zoomLevel
        }, {
          property: "opacity",
          from: 1,
          to: 0
        }], 1000, am4core.ease.circleOut);
        animation.events.on("animationended", function(event) {
          animateBullet(event.target.object);
        })
      }

      var colorSet = new am4core.ColorSet();
      updateChart(elem[0]); //carico di default le info di alessiodom

      document.getElementsByName("alessiodom97")[0].addEventListener("click", function() {
        updateChart(elem[0]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("alessiodom97");
        changePerc(elem[0]);
        changeProgress();
      });
      document.getElementsByName("Oliver")[0].addEventListener("click", function() {
        updateChart(elem[6]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Oliver");
        changePerc(elem[6]);
        changeProgress();
      });
      document.getElementsByName("Toto")[0].addEventListener("click", function() {
        updateChart(elem[9]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Toto");
        changePerc(elem[9]);
        changeProgress();
      });
      document.getElementsByName("Ciccio")[0].addEventListener("click", function() {
        updateChart(elem[2]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Ciccio");
        changePerc(elem[2]);
        changeProgress();
      });
      document.getElementsByName("SpiritoBlu")[0].addEventListener("click", function() {
        updateChart(elem[8]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("SpiritoBlu");
        changePerc(elem[8]);
        changeProgress();
      });
      document.getElementsByName("gianpaolo")[0].addEventListener("click", function() {
        updateChart(elem[5]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("gianpaolo");
        changePerc(elem[5]);
        changeProgress();
      });
      document.getElementsByName("Andrea")[0].addEventListener("click", function() {
        updateChart(elem[1]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Andrea");
        changePerc(elem[1]);
        changeProgress();
      });
      document.getElementsByName("Dario")[0].addEventListener("click", function() {
        updateChart(elem[3]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Dario");
        changePerc(elem[3]);
        changeProgress();
      });
      document.getElementsByName("pinguinoSquadraCorse")[0].addEventListener("click", function() {
        updateChart(elem[7]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("pinguinoSquadraCorse");
        changePerc(elem[7]);
        changeProgress();
      });
      document.getElementsByName("Ermenegildo")[0].addEventListener("click", function() {
        updateChart(elem[4]);
        removeEvent();
        setTimeout(loadEvent, 500);
        activeElement("Ermenegildo");
        changePerc(elem[4]);
        changeProgress();
      });


      function updateChart(e) {
        imageSeries.data = [{
            "title": "Monza",
            "stato": "Italia-Monza",
            "circuito": "Autodromo nazionale di Monza",
            "latitude": 45.62208,
            "longitude": 9.28490,
            "color": colorSet.next()
          },
          {
            "title": "Sakhir",
            "stato": "Bahrein",
            "circuito": "Bahrain International Circuit",
            "latitude": 26.03348,
            "longitude": 50.51122,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Imola",
            "stato": "Italia-Imola",
            "circuito": "Autodromo Enzo e Dino Ferrari",
            "latitude": 44.34638,
            "longitude": 11.71517,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Portimao",
            "stato": "Portogallo",
            "circuito": "Autódromo internacional do Algarve",
            "latitude": 37.1986,
            "longitude": -8.6243,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Montmelo",
            "stato": "Spagna",
            "circuito": "Circuito di Catalogna",
            "latitude": 41.439,
            "longitude": 2.263,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Monaco",
            "stato": "Monaco",
            "circuito": "Circuito di Monte Carlo",
            "latitude": 43.608,
            "longitude": 7.421,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Baku",
            "stato": "Azerbaigian",
            "circuito": "Circuito di Baku",
            "latitude": 40.242,
            "longitude": 49.856,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Le Castellet",
            "stato": "Francia",
            "circuito": "Circuito Paul Ricard",
            "latitude": 43.125,
            "longitude": 5.79,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Spielberg",
            "stato": "Austria",
            "circuito": "Red Bull Ring",
            "latitude": 47.104,
            "longitude": 14.766,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Spielberg",
            "stato": "Austria-2",
            "circuito": "Gran Premio di Stiria",
            "latitude": 47.254,
            "longitude": 14.766,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Silverstone",
            "stato": "Gran Bretagna",
            "circuito": "Circuito di Silverstone",
            "latitude": 51.971,
            "longitude": -1.016,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Mogyorod",
            "stato": "Ungheria",
            "circuito": "Hungaroring",
            "latitude": 47.58246,
            "longitude": 19.25044,
            "punti": 0,
            "qp1": 0,
            "qp2": 0,
            "qp3": 0,
            "gp1": 0,
            "gp2": 0,
            "gp3": 0,
            "gv": 0,
            "nrit": 0,
            "sc": 0,
            "vsc": 0,
            "color": colorSet.next()
          },
          {
            "title": "Francorchamps",
            "stato": "Belgio",
            "circuito": "Circuito di Spa-Francorchamps",
            "latitude": 50.328,
            "longitude": 5.971,
            "color": colorSet.next()
          },
          {
            "title": "Zandvoort",
            "stato": "Olanda",
            "circuito": "Circuit Zandvoort",
            "latitude": 52.282,
            "longitude": 4.543,
            "color": colorSet.next()
          },
          {
            "title": "Soči",
            "stato": "Russia",
            "circuito": "Autodromo di Soči",
            "latitude": 43.281,
            "longitude": 39.968,
            "color": colorSet.next()
          },
          {
            "title": "Istanbul",
            "stato": "Turchia",
            "circuito": "Istanbul Park",
            "latitude": 40.824,
            "longitude": 29.405,
            "color": colorSet.next()
          },
          {
            "title": "Austin",
            "stato": "USA",
            "circuito": "Circuito delle Americhe",
            "latitude": 29.983,
            "longitude": -97.641,
            "color": colorSet.next()
          },
          {
            "title": "Citta del Messico",
            "stato": "Messico",
            "circuito": "Autódromo Hermanos Rodríguez",
            "latitude": 19.239,
            "longitude": -99.091,
            "color": colorSet.next()
          },
          {
            "title": "Interlagos",
            "stato": "Brasile",
            "circuito": "Autódromo José Carlos Pace",
            "latitude": -23.861,
            "longitude": -46.697,
            "color": colorSet.next()
          },
          {
            "title": "Gedda",
            "stato": "Arabia Saudita",
            "circuito": "Gedda Street Circuit",
            "latitude": 21.474,
            "longitude": 39.106,
            "color": colorSet.next()
          },
          {
            "title": "Losail",
            "stato": "Qatar",
            "circuito": "Losail International Circuit",
            "latitude": 25.4644,
            "longitude": 51.4517,
            "color": colorSet.next()
          },
          {
            "title": "Abu Dhabi",
            "stato": "Emirati Arabi Uniti",
            "circuito": "Circuito Yas Marina",
            "latitude": 24.312,
            "longitude": 54.608,
            "color": colorSet.next()
          }
        ];
        var lenght = imageSeries.data.length;
        for (var i = 0; i < lenght; i++) {
          for (var j = 0; j < e.length; j++) {
            if (imageSeries.data[i].stato == e[j].nome_gara) {
              imageSeries.data[i].punti = e[j].punti;
              imageSeries.data[i].qp1 = e[j].qp1;
              imageSeries.data[i].qp2 = e[j].qp2;
              imageSeries.data[i].qp3 = e[j].qp3;
              imageSeries.data[i].gp1 = e[j].gp1;
              imageSeries.data[i].gp2 = e[j].gp2;
              imageSeries.data[i].gp3 = e[j].gp3;
              imageSeries.data[i].gv = e[j].giro_veloce;
              imageSeries.data[i].nrit = e[j].n_ritirati;
              imageSeries.data[i].sc = e[j].SC;
              imageSeries.data[i].vsc = e[j].VSC;
            }
          }
        }
      }
    })
    var circleDom = document.getElementsByClassName("amcharts-Sprite-group amcharts-Container-group amcharts-MapObject-group amcharts-MapImage-group");
    var statoDom = document.getElementsByClassName("stato");

    function loadEvent() {
      for (var i = 0; i < circleDom.length; i++) {
        if (window.innerWidth <= 991) {
          circleDom[i].addEventListener('touchstart', function() {
            changeColor();
          })
        } else {
          circleDom[i].addEventListener('mouseover', function() {
            changeColor();
          })
        }
      }
    }

    function removeEvent() {
      for (var i = 0; i < circleDom.length; i++) {
        if (window.innerWidth <= 991) {
          circleDom[i].removeEventListener('touchstart', function() {
            changeColor();
          })
        } else {
          circleDom[i].removeEventListener('mouseover', function() {
            changeColor();
          })
        }
      }
    }

    setTimeout(loadEvent, 500);

    function changeColor() {
      var domTooltip = document.querySelectorAll(".pronosticiRow .col p:nth-child(2)");
      for (var j = 0; j < risultati.length; j++) {
        if (statoDom[0].innerHTML == risultati[j].nome_gara) {
          if (domTooltip[0].innerHTML == risultati[j].qp1) domTooltip[0].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[1].innerHTML == risultati[j].qp2) domTooltip[1].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[2].innerHTML == risultati[j].qp3) domTooltip[2].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[3].innerHTML == risultati[j].gp1) domTooltip[3].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[4].innerHTML == risultati[j].gp2) domTooltip[4].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[5].innerHTML == risultati[j].gp3) domTooltip[5].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[6].innerHTML == risultati[j].giro_veloce) domTooltip[6].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[7].innerHTML == risultati[j].n_ritirati) domTooltip[7].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[8].innerHTML == risultati[j].SC) domTooltip[8].style.color = "rgba(113, 255, 47, 1)";
          if (domTooltip[9].innerHTML == risultati[j].VSC) domTooltip[9].style.color = "rgba(113, 255, 47, 1)";
          break;
        }
      }
    }

    function changePerc(player) {
      var qualiNum = 0;
      var garaNum = 0;
      var nritNum = 0;
      var vscNum = 0;
      var scNum = 0;
      var giroVeloceNum = 0;
      var maxPt = 0;
      var minPt = 1000;
      var nomeGaraMinPt = "";
      var nomeGaraMaxPt = "";

      for (var i = 0; i < risultati.length; i++) {
        for (var j = 0; j < player.length; j++) {
          if (risultati[i].nome_gara == player[j].nome_gara) {
            if (risultati[i].qp1 == player[j].qp1 && risultati[i].qp2 == player[j].qp2 && risultati[i].qp3 == player[j].qp3) {
              qualiNum++;
            }
            if (risultati[i].gp1 == player[j].gp1 && risultati[i].gp2 == player[j].gp2 && risultati[i].gp3 == player[j].gp3) {
              garaNum++;
            }
            if (risultati[i].giro_veloce == player[j].giro_veloce) {
              giroVeloceNum++;
            }
            if (risultati[i].VSC == player[j].VSC) {
              vscNum++;
            }
            if (risultati[i].SC == player[j].SC) {
              scNum++;
            }
            if (risultati[i].n_ritirati == player[j].n_ritirati) {
              nritNum++;
            }
            if (parseInt(player[j].punti) > parseInt(maxPt)) {
              maxPt = player[j].punti;
              nomeGaraMaxPt = player[j].nome_gara; //memorizzo il nome della gara
            }
            if (parseInt(player[j].punti) < parseInt(minPt)) {
              minPt = player[j].punti;
              nomeGaraMinPt = player[j].nome_gara; //memorizzo il nome della gara
            }
          }
        }
      }
      var domElement = document.getElementsByClassName("valorePerc");
      var risLength = risultati.length;
      domElement[0].innerHTML = (100 * garaNum / risLength).toFixed() + "%";
      domElement[1].innerHTML = (100 * qualiNum / risLength).toFixed() + "%";
      domElement[2].innerHTML = (100 * nritNum / risLength).toFixed() + "%";
      domElement[3].innerHTML = (100 * vscNum / risLength).toFixed() + "%";
      domElement[4].innerHTML = (100 * scNum / risLength).toFixed() + "%";
      domElement[5].innerHTML = (100 * giroVeloceNum / risLength).toFixed() + "%";
      document.getElementsByClassName("ptMax")[0].innerHTML = maxPt + "pt";
      document.getElementsByClassName("ptMin")[0].innerHTML = minPt + "pt";
      //cambio il src delle img del tooltip dei ptMax e ptMin
      document.getElementsByClassName("tooltipPtMinImgStato")[0].src = "img/bandiere/" + nomeGaraMinPt + ".png";
      document.getElementsByClassName("tooltipPtMaxImgStato")[0].src = "img/bandiere/" + nomeGaraMaxPt + ".png";
      document.getElementsByClassName("tooltipPtMaxCircuito")[0].innerHTML = nomeGaraMaxPt;
      document.getElementsByClassName("tooltipPtMinCircuito")[0].innerHTML = nomeGaraMinPt;

    }

    function activeElement(nome) {
      var arrName = ["Oliver", "alessiodom97", "Toto", "Ciccio", "SpiritoBlu", "gianpaolo", "Ermenegildo", "Dario", "Andrea", "pinguinoSquadraCorse"];
      var element = document.getElementsByName(nome)[0];
      for (var i = 0; i < arrName.length; i++) {
        if (arrName[i] == nome) {
          if (!element.classList.contains('attiva')) {
            element.className += " attiva";
            document.getElementsByClassName("contStat")[0].style.visibility = "visible";
          }
        } else {
          document.getElementsByName(arrName[i])[0].classList.remove('attiva');
        }
      }
      setTimeout(function() {
        var myCollapse = document.getElementById('collapseOne')
        var bsCollapse = new bootstrap.Collapse(myCollapse, {
          hide: false
        })
      }, 250);
    }
  </script>
  <script src="./js/circleAnim.js"></script>
  <script src="./js/tooltipAni.js?n=0.1"></script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>