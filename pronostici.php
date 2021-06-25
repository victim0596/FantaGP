<?php session_start()?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>FantaGP 2021</title>
	<meta name="description" content="Sito per il fantaGP">
	<meta name="author" content="Oliver Terzo">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/pronostici.css?n=1">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
	<link rel="shortcut icon" href="/logo.ico" />	
</head>
<body>

	<!----NAVBAR --->
	<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <a class="navbar-brand" href="index.php">
  	<img src="element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link" href="index.php">Home</a>
      <a class="nav-link" href="classifica.php">Classifica</a>
      <a class="nav-link" href="partecipanti.php">Partecipanti</a>
      <a class="nav-link" href="punteggi.php">Punteggi per gara</a>
      <a class="nav-link active" href="pronostici.php">Pronostici</a>
      <?php if (isset($_SESSION['session_id'])) { ?>
	  <a class="nav-link" href="profilo.php"><?php echo $_SESSION['session_user'];?></a>	
	   <?php } else { ?>		
      <a class="nav-link" href="login.php">Login</a><?php }?>	
    </div>
  </div> 
</nav>
<!---- CAROUSEL --->
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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

	  <?php include 'pronostici_quali.php';?>
		
      	
	<div class="container_btn">
		<!-- Button Qualifica -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalqualy">
		  <div>
			  <img src="img/qualy.jpg">
			  <div><span>Pronostici Qualifica</span></div>
		  </div>
		</button>
		<!-- Button Gara -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalrace">
		  <div>
			  <img src="img/race.jpg">
			  <div><span>Pronostici Gara</span></div>
		  </div>
		</button>
		<div><span class="text_pron"><?php echo $text; ?></span></div>
	</div>
		

		<!-- Modal Qualifica -->
		<div class="modal fade" id="modalqualy" tabindex="-1" aria-labelledby="modalqualy" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalqualy">Pronostici Qualifica</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

		        <form method="post" action="">
				  <div class="form-group ">
				    <label for="listrace"></label>
				    <input list="list_race" class="form-control form-control-sm" name="nome_gara" placeholder="Nome Gara">
				  </div>
				  <div class="form-group">
				    <label for="qp1"></label>
				    <input list="list_driver" class="form-control form-control-sm" name="qp1" placeholder="Qualifica P1">
				  </div>
				  <div class="form-group">
				    <label for="qp2"></label>
				    <input list="list_driver" class="form-control form-control-sm" name="qp2" placeholder="Qualifica P2">
				  </div>
				  <div class="form-group">
				    <label for="qp3"></label>
				    <input list="list_driver" class="form-control form-control-sm" name="qp3" placeholder="Qualifica P3">
				  </div>
				  <div class="modal-footer">
		        	<button type="submit" class="btn btn_send" name="invia_quali">Invia</button>
		      	  </div>
				</form>
		      </div>
		      
		    </div>
		  </div>
		</div>


		
		
		
		

		<!-- Modal Gara -->
		<div class="modal fade" id="modalrace" tabindex="-1" aria-labelledby="modalrace" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalrace">Pronostici Gara</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="post" action="">
		        	<div class="form-group ">
				    	<label for="listrace"></label>
				    	<input list="list_race" class="form-control form-control-sm" name="nome_gara" placeholder="Nome Gara">
				  	</div>
		        	<div class="form-group">
					    <label for="gp1"></label>
					    <input list="list_driver" class="form-control form-control-sm" name="gp1" placeholder="Gara P1">
					  </div>
					  <div class="form-group">
					    <label for="gp2"></label>
					    <input list="list_driver" class="form-control form-control-sm" name="gp2" placeholder="Gara P2">
					  </div>
					  <div class="form-group">
					    <label for="gp3"></label>
					    <input list="list_driver" class="form-control form-control-sm" name="gp3" placeholder="Gara P3">
					  </div>
					  <div class="form-group">
					    <label for="giro_veloce"></label>
					    <input list="list_driver" class="form-control form-control-sm" name="giro_veloce" placeholder="Giro Veloce">
					  </div>
					  <div class="form-group">
					    <label for="n_ritirati"></label>
					    <input list="n_rit" class="form-control form-control-sm" name="n_ritirati" placeholder="Numero ritirati">
					  </div>
					  <div class="form-group">
					    <label for="vsc"></label>
					    <input list="bool" class="form-control form-control-sm" name="vsc" placeholder="Virtual Safety Car">
					  </div>
					  <div class="form-group">
					    <label for="sc"></label>
					    <input list="bool" class="form-control form-control-sm" name="sc" placeholder="Safety Car">
					  </div>
					  <div class="modal-footer">
				        <button type="submit" class="btn btn_send" name="invia_race">Invia</button>
				      </div>
		        </form>
		      </div>
		      
		    </div>
		  </div>
		</div>
		
		<datalist id="list_race">
				
				<option value="Bahrein">
				<option value="Italia-Imola">
				<option value="Portogallo">
				<option value="Spagna">
				<option value="Monaco">
				<option value="Azerbaigian">
				<option value="Turchia">
				<option value="Francia">
				<option value="Austria">
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
			<datalist id="list_driver">
				<option value="Hamilton">
				<option value="Bottas">
				<option value="Leclerc">
				<option value="Sainz">
				<option value="Verstappen">
				<option value="Perez">
				<option value="Vettel">
				<option value="Stroll">
				<option value="Ricciardo">
				<option value="Norris">
				<option value="Raikkonen">
				<option value="Giovinazzi">
				<option value="Alonso">
				<option value="Ocon">
				<option value="Mazepin">
				<option value="Schumacher">
				<option value="Gasly">
				<option value="Tsunoda">
				<option value="Russel">
				<option value="Latifi">
			</datalist>
		<datalist id="n_rit">
				<option value="0">
				<option value="1">
				<option value="2">
				<option value="3">
				<option value="4">
				<option value="5">
				<option value="6">
				<option value="7">
				<option value="8">
				<option value="9">
				<option value="10">
			</datalist>
		<datalist id="bool">
				<option value="Si">
				<option value="No">
			</datalist>

    </div>
  </div>
</header>
		
	


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>