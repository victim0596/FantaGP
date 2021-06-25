<?php session_start()?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>FantaGP 2021</title>
	<meta name="description" content="Sito per il fantaGP">
	<meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css?n=1.02">
  <link rel="stylesheet" href="css/login.css">
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
      <a class="nav-link" href="punteggi.php">Punteggi per gara</a>
      <a class="nav-link" href="pronostici.php">Pronostici</a>
      <?php if (isset($_SESSION['session_id'])) { ?>
    <a class="nav-link" href="profilo.php"><?php echo $_SESSION['session_user'];?></a>  
     <?php } else { ?>    
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

<div class="position-absolute form_login">
  <form class="px-4 py-3" method="post" action="login2.php">
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
</div>

    </div>
  </div>
</header>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>