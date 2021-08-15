<?php

include 'connection.php';
if (mysqli_connect_error()) {
    die('Errore di connessione (' . mysqli_connect_error() . ')');
}
$arrayGara = array();
$index = 0;
$sql = "SELECT id_p,nome_gara,qp1,qp2,qp3,gp1,gp2,gp3,giro_veloce,n_ritirati,VSC,SC,punti FROM pronostici ORDER BY id_p,nome_gara";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { // loop to store the data in an associative array.
    $arrayPlayer[$index] = $row;
    $index++;
}
$num_row = ($result->num_rows) / 10;
$arrayGara = array_chunk($arrayPlayer, $num_row);
$conn->close();

?>


<script>

var elem= <?php echo json_encode($arrayGara); ?>;
am4core.ready(function() {

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
    imageSeries.mapImages.template.tooltipHTML = `
    <div class="container" style="border-bottom: 2px solid white">
        <div class="row" style="text-align: center">
            <div class="col colTooltip">
                <div>
                    <img class="imgTooltip" src="./img/bandiere/{stato}.png">
                </div>
                <div>
                    <p>{stato}</p>
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
    imageSeries.mapImages.template.propertyFields.url = "url";

    imageSeries.tooltip.getFillFromObject = false;
    imageSeries.tooltip.background.fill = am4core.color("#212129");
    imageSeries.tooltip.label.maxHeight= 150;
    imageSeries.tooltip.label.wrap = true;

    var circle = imageSeries.mapImages.template.createChild(am4core.Circle);
    circle.radius = 3;
    circle.propertyFields.fill = "color";
    circle.nonScaling = true;

    var circle2 = imageSeries.mapImages.template.createChild(am4core.Circle);
    circle2.radius = 3;
    circle2.propertyFields.fill = "color";


    circle2.events.on("inited", function(event){
      animateBullet(event.target);
    })


    function animateBullet(circle) {
        var animation = circle.animate([{ property: "scale", from: 1 / chart.zoomLevel, to: 5 / chart.zoomLevel }, { property: "opacity", from: 1, to: 0 }], 1000, am4core.ease.circleOut);
        animation.events.on("animationended", function(event){
          animateBullet(event.target.object);
        })
    }

    var colorSet = new am4core.ColorSet();
    updateChart(elem[0]);

    document.getElementsByName("alessiodom97")[0].addEventListener("click", function(){
      updateChart(elem[0]);
    });
    document.getElementsByName("Oliver")[0].addEventListener("click", function(){
      updateChart(elem[6]);
    });
    document.getElementsByName("Toto")[0].addEventListener("click", function(){
      updateChart(elem[9]);
    });
    document.getElementsByName("Ciccio")[0].addEventListener("click", function(){
      updateChart(elem[2]);
    });
    document.getElementsByName("SpiritoBlu")[0].addEventListener("click", function(){
      updateChart(elem[8]);
    });
    document.getElementsByName("gianpaolo")[0].addEventListener("click", function(){
      updateChart(elem[5]);
    });
    document.getElementsByName("Andrea")[0].addEventListener("click", function(){
      updateChart(elem[1]);
    });
    document.getElementsByName("Dario")[0].addEventListener("click", function(){
      updateChart(elem[3]);
    });
    document.getElementsByName("pinguinoSquadraCorse")[0].addEventListener("click", function(){
      updateChart(elem[7]);
    });
    document.getElementsByName("Ermenegildo")[0].addEventListener("click", function(){
      updateChart(elem[4]);
    });

    function updateChart(e){
      imageSeries.data = [ {
      "title": "Monza",
      "stato": "Italia-Monza",
      "circuito": "Autodromo nazionale di Monza",
      "latitude": 45.62208,
      "longitude": 9.28490,
      "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
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
        "gp1":0,
        "gp2": 0,
        "gp3": 0,
        "gv": 0,
        "nrit": 0,
        "sc": 0,
        "vsc": 0,
        "color":colorSet.next()
      },
      {
        "title": "Francorchamps",
        "stato": "Belgio",
        "circuito": "Circuito di Spa-Francorchamps",
        "latitude": 50.328,
        "longitude": 5.971,
        "color":colorSet.next()
      },
      {
        "title": "Zandvoort",
        "stato": "Olanda",
        "circuito": "Circuit Zandvoort",
        "latitude": 52.282,
        "longitude": 4.543,
        "color":colorSet.next()
      },
      {
        "title": "Soči",
        "stato": "Russia",
        "circuito": "Autodromo di Soči",
        "latitude": 43.281,
        "longitude": 39.968,
        "color":colorSet.next()
      },
      {
        "title": "Marina Bay",
        "stato": "Singapore",
        "circuito": "Marina Bay Street Circuit",
        "latitude": 1.121,
        "longitude": 103.865,
        "color":colorSet.next()
      },
      {
        "title": "Suzuka",
        "stato": "Giappone",
        "circuito": "Circuito di Suzuka",
        "latitude": 34.701,
        "longitude": 136.538,
        "color":colorSet.next()
      },
      {
        "title": "Austin",
        "stato": "USA",
        "circuito": "Circuito delle Americhe",
        "latitude": 29.983,
        "longitude": -97.641,
        "color":colorSet.next()
      },
      {
        "title": "Citta del Messico",
        "stato": "Messico",
        "circuito": "Autódromo Hermanos Rodríguez",
        "latitude": 19.239,
        "longitude": -99.091,
        "color":colorSet.next()
      },
      {
        "title": "Interlagos",
        "stato": "Brasile",
        "circuito": "Autódromo José Carlos Pace",
        "latitude": -23.861,
        "longitude": -46.697,
        "color":colorSet.next()
      },
      {
        "title": "Melbourne",
        "stato": "Australia",
        "circuito": "Circuito Albert Park",
        "latitude": -37.988,
        "longitude": 144.97,
        "color":colorSet.next()
      },
      {
        "title": "Gedda",
        "stato": "Arabia Saudita",
        "circuito": "Gedda Street Circuit",
        "latitude": 21.474,
        "longitude": 39.106,
        "color":colorSet.next()
      },
      {
        "title": "Abu Dhabi",
        "stato": "Emirati Arabi Uniti",
        "circuito": "Circuito Yas Marina",
        "latitude": 24.312,
        "longitude": 54.608,
        "color":colorSet.next()
      }];
      var lenght = imageSeries.data.length;
      console.log(lenght);
      for(var i=0; i<lenght; i++){
       for(var j=0; j<e.length; j++){
         if(imageSeries.data[i].stato == e[j].nome_gara){
          imageSeries.data[i].punti =e[j].punti;
          imageSeries.data[i].qp1 =e[j].qp1;
          imageSeries.data[i].qp2 =e[j].qp2;
          imageSeries.data[i].qp3 =e[j].qp3;
          imageSeries.data[i].gp1 =e[j].gp1;
          imageSeries.data[i].gp2 =e[j].gp2;
          imageSeries.data[i].gp3 =e[j].gp3;
          imageSeries.data[i].gv =e[j].giro_veloce;
          imageSeries.data[i].nrit =e[j].n_ritirati;
          imageSeries.data[i].sc =e[j].SC;
          imageSeries.data[i].vsc =e[j].VSC;
         }
       }
      }

    }
  })

  </script>



