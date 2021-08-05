<?php

$nomegara = "";
$nomeutente = "";
$qualifica1 = "";
$qualifica2 = "";
$qualifica3 = "";
$gara1 = "";
$gara2 = "";
$gara3 = "";
$giroveloce = "";
$nrit = "";
$sc = "";
$vsc = "";
$pt = "";
$text = "";
if (isset($_POST['submit_button'])) {
    if (strcasecmp($_POST['listrace'], "Austria") != 0) {
        include 'connection.php';
        if (mysqli_connect_error()) {
            die('Errore di connessione (' . mysqli_connect_error() . ')');
        } else {
            // $link=mysql_connect($host, $dbusername, $dbpassword); per php 5
            // mysql_select_db($dbname,$link); per php 5
            $nomegara = $_POST['listrace'];
            $nomeutente = $_POST['utente'];
            $sql = "SELECT * from pronostici where id_p='$nomeutente' and nome_gara='$nomegara'";
            $result = $conn->query($sql);
            $num_row = $result->num_rows;
            if ($num_row == 0) {
                $text = "Non ci sono risultati per questa gara";
            } else {
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
                $qualifica1 = $data['qp1'];
                $qualifica2 = $data['qp2'];
                $qualifica3 = $data['qp3'];
                $gara1 = $data['gp1'];
                $gara2 = $data['gp2'];
                $gara3 = $data['gp3'];
                $giroveloce = $data['giro_veloce'];
                $nrit = $data['n_ritirati'];
                $sc = $data['SC'];
                $vsc = $data['VSC'];
                $pt = $data['punti'];
            }
        }
        $conn->close();
    } else {
        $text = "Non puoi ancora vedere i risultati per questa gara";
    }

}

?>
<?php session_start()?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>FantaGP 2021</title>
	<meta name="description" content="Sito per il fantaGP">
	<meta name="author" content="Oliver Terzo">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css?n=1.01">
  <link rel="stylesheet" href="css/punteggi.css">
  <link rel="stylesheet" href="css/partecipanti.css">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />

</head>
<body>

<!----NAVBAR --->
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <a class="navbar-brand" href="index.php">
  	<img src="element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link" href="index.php">Home</a>
      <a class="nav-link" href="classifica.php">Classifica</a>
      <a class="nav-link" href="partecipanti.php">Partecipanti</a>
      <a class="nav-link active" href="punteggi.php">Punteggi per gara</a>
      <a class="nav-link" href="pronostici.php">Pronostici</a>
      <?php if (isset($_SESSION['session_id'])) {?>
    <a class="nav-link" href="profilo.php"><?php echo $_SESSION['session_user']; ?></a>
     <?php } else {?>
      <a class="nav-link" href="login.php">Login</a><?php }?>
    </div>
  </div>
</nav>
<!---- CAROUSEL --->
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride
="carousel">
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

      <div class="text_ris"><?php echo $text; ?></div>

      <form method="post" action="" class="punteggi">
        <div class="form-row">
        <div class="col">
          <label for="utente"></label>
          <input list="partecipanti" class="form-control form-control-sm" name="utente" placeholder="Nome Utente">
        </div>
        <div class="col">
          <label for="listrace"></label>
          <input list="list_race" class="form-control form-control-sm" name="listrace" placeholder="Nome gara">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-10">
          <button class="btn btn-primary button_send"  name="submit_button">INVIA</button>
        </div>
      </div>

      <datalist id="list_race">
        <option value="Bahrein">
        <option value="Italia-Imola">
        <option value="Portogallo">
        <option value="Spagna">
        <option value="Monaco">
        <option value="Azerbaigian">
        <option value="Francia">
        <option value="Austria">
        <option value="Austria-2">
        <option value="Gran Bretagna">
        <option value="Ungheria">
        <option value="Belgio">
        <option value="Olanda">
        <option value="Italia-Monza">
        <option value="Russia">
        <option value="Singapore">
        <option value="Giappone">
        <option value="USA">
        <option value="Messico">
        <option value="Brasile">
        <option value="Australia">
        <option value="Arabia Saudita">
        <option value="Emirati Arabi">
      </datalist>

      <datalist id="partecipanti">
        <option value="Oliver">
        <option value="Ciccio">
        <option value="Andrea">
        <option value="Toto">
        <option value="Dario">
        <option value="gianpaolo">
        <option value="SpiritoBlu">
        <option value="pinguinoSquadracorse">
        <option value="Ermenegildo">
        <option value="alessiodom97">
      </datalist>

  <table class="table-responsive portrait">
  <thead>
  </thead>
    <tbody>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Nome Utente</td>
      <td name="qp1"><?php echo $nomeutente; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Nome Gara</td>
      <td name="qp1"><?php echo $nomegara; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P1</td>
      <td name="qp1"><?php echo $qualifica1; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P2</td>
      <td id="qp2"><?php echo $qualifica2; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P3</td>
      <td id="qp3"><?php echo $qualifica3; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P1</td>
      <td id="gp1"><?php echo $gara1; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P2</td>
      <td id="gp2"><?php echo $gara2; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P3</td>
      <td id="gp3"><?php echo $gara3; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Giro Veloce</td>
      <td id="giro_veloce"><?php echo $giroveloce; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Safety Car</td>
      <td id="sc"><?php echo $sc; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Virtual Safety Car</td>
      <td id="vsc"><?php echo $vsc; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Numero Ritirati</td>
      <td id="n_rit"><?php echo $nrit; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Punti</td>
      <td id="punti"><?php echo $pt; ?></td>
    </tr>
  </tbody>
  </table>

  <!----LANDSCAPE--->
  <table class="table-responsive landscape">
  <thead>
  </thead>
    <tbody>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Nome Utente</td>
      <td name="qp1"><?php echo $nomeutente; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Nome Gara</td>
      <td name="qp1"><?php echo $nomegara; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P1</td>
      <td name="qp1"><?php echo $qualifica1; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P2</td>
      <td id="qp2"><?php echo $qualifica2; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Qualifica P3</td>
      <td id="qp3"><?php echo $qualifica3; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Safety Car</td>
      <td id="sc"><?php echo $sc; ?></td>
    </tr>
    </tbody>
  </table>

  <table class="table-responsive landscape2">
  <thead>
  </thead>
    <tbody>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P1</td>
      <td id="gp1"><?php echo $gara1; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P2</td>
      <td id="gp2"><?php echo $gara2; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Gara P3</td>
      <td id="gp3"><?php echo $gara3; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Giro Veloce</td>
      <td id="giro_veloce"><?php echo $giroveloce; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Virtual Safety Car</td>
      <td id="vsc"><?php echo $vsc; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Numero Ritirati</td>
      <td id="n_rit"><?php echo $nrit; ?></td>
    </tr>
    <tr>
      <th class="colonna" scope="row"></th>
      <td>Punti</td>
      <td id="punti"><?php echo $pt; ?></td>
    </tr>
  </tbody>
  </table>


      </form>




    </div>
  </div>
</header>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>