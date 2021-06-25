<?php
      session_start();
      if(isset($_POST['Log-out'])){
        session_destroy();
        header('Location: index.php');
        exit;
      }
           
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="utf-8">
	<title>FantaGP 2021</title>
	<meta name="description" content="Sito per il fantaGP">
	<meta name="author" content="Oliver Terzo">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/pronostici.css?n=1.01">
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
      <a class="nav-link" href="pronostici.php">Pronostici</a>
      <?php if (isset($_SESSION['session_id'])) { ?>
      <a class="nav-link active" href="profilo.php"><?php echo $_SESSION['session_user'];?></a>  
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
      
      <?php include 'riepilogo_pronostici.php'; ?>
      <?php include 'mod_quali.php'; ?>
      <?php include 'mod_race.php'; ?>
      <div class="text_modpron"><?php echo $text; ?></div>

      <div class="position-absolute form_login">
        <form method="post" action="">
          <button type="submit" class="btn btn_logout" name="Log-out">Logout</button>
        </form>
      </div>


      <!-- Button Qualifica -->
    <button type="button" class="btn btn-primary btn_mq position-absolute" data-toggle="modal" data-target="#modalqualy">
      Modifica Pronostici Qualifica
    </button>
    <!-- Button Gara -->
    <button type="button" class="btn btn-primary btn_mr position-absolute" data-toggle="modal" data-target="#modalrace">
     Modifica Pronostici Gara
    </button>
    <!-- Button Pronostici Attuali -->
    <button type="button" class="btn btn-primary btn_pratt position-absolute" data-toggle="modal" data-target="#modalpron">
     Riepilogo Pronostici
    </button>

  
  <!-- Modal Riepilogo pronostici -->
  <div class="modal fade" id="modalpron" tabindex="-1" aria-labelledby="modalpron" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalpron">Riepilogo Pronostici</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Gara:<span style="margin-left:20px;"><?php echo $nomegara;?></span></br>
            Qualifica P1:<span style="margin-left:20px;"><?php echo $qualifica1;?></span></br>
            Qualifica P2:<span style="margin-left:20px;"><?php echo $qualifica2;?></span></br>
            Qualifica P3:<span style="margin-left:20px;"><?php echo $qualifica3;?></span></br>
            Gara P1:<span style="margin-left:20px;"><?php echo $gara1;?></span></br>
            Gara P2:<span style="margin-left:20px;"><?php echo $gara2;?></span></br>
            Gara P3:<span style="margin-left:20px;"><?php echo $gara3;?></span></br>
            Giro veloce:<span style="margin-left:20px;"><?php echo $giroveloce;?></span></br>
            Numero ritirati:<span style="margin-left:20px;"><?php echo $nrit;?></span></br>
            VSC:<span style="margin-left:20px;"><?php echo $vsc;?></span></br>
            SC:<span style="margin-left:20px;"><?php echo $sc;?></span></br>
          </div>          
        </div>
      </div>
    </div>

    <!-- Modal Modifica Qualifica -->
    <div class="modal fade" id="modalqualy" tabindex="-1" aria-labelledby="modalqualy" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalqualy">Modifica Pronostici Qualifica</h5>
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
              <button type="submit" class="btn btn_send" name="mod_quali">Invia</button>
              </div>
        </form>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Modal Modifica Gara -->
    <div class="modal fade" id="modalrace" tabindex="-1" aria-labelledby="modalrace" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalrace">Modifica Pronostici Gara</h5>
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
                <button type="submit" class="btn btn_send " name="mod_race">Invia</button>
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
        <option value="Russell">
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
      <datalist id="list_typerit">
        <option value="Gara">
        <option value="Qualifica">
      </datalist>
      

      <?php if (isset($_SESSION['session_id'])) {
      //Sessione Admin
               
              if($_SESSION['session_user']=="Oliver"){ 
                include 'calcolo_punteggi.php'; 
                include 'add_rit.php';
                include 'add_qualy.php';
                include 'add_race.php';
                include 'add_pagelle.php';
                ?>
              <button type="button" class="btn btn-primary position-absolute addq" data-toggle="modal" data-target="#modaladdq">
               Aggiungi risultati Qualifiche
              </button>
              <button type="button" class="btn btn-primary position-absolute addr" data-toggle="modal" data-target="#modaladdr">
               Aggiungi risultati Gara
              </button>
              <button type="button" class="btn btn-primary position-absolute addp" data-toggle="modal" data-target="#modaladdp">
               Aggiungi pagelle
              </button>
              <button type="button" class="btn btn-primary position-absolute addc" data-toggle="modal" data-target="#modalcalcolo">
                 Calcola Punteggi
              </button>
              <button type="button" class="btn btn-primary position-absolute addrit" data-toggle="modal" data-target="#modaladdrit">
               Aggiungi ritirati
              </button>
              <div class="position-absolute text"><?php echo $text; ?></div>
              <div class="position-absolute text_addrit"><?php echo $text1; ?></div>
              <!-- Modal Aggiungi risultati Qualifica -->
              <div class="modal fade" id="modaladdq" tabindex="-1" aria-labelledby="modaladdq" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modaladdq">Aggiungi risultati Qualifica</h5>
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
                        <button type="submit" class="btn btn_send" name="add_res_quali">Invia</button>
                        </div>
                  </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              
              <!-- Modal Aggiungi risultati Gara -->
              <div class="modal fade" id="modaladdr" tabindex="-1" aria-labelledby="modaladdr" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modaladdr">Aggiungi risultati Gara</h5>
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
                          <button type="submit" class="btn btn_send " name="add_res_race">Invia</button>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>

              <!-- Modal Aggiungi pagelle -->
              <div class="modal fade" id="modaladdp" tabindex="-1" aria-labelledby="modaladdp" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modaladdp">Aggiungi Pagelle</h5>
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
                      <label for="pilota"></label>
                      <input list="list_driver" class="form-control form-control-sm" name="pilota" placeholder="Pilota">
                    </div>
                    <div class="form-group">
                      <label for="sito1"></label>
                      <input type="number" step="0.5" class="form-control form-control-sm" name="sito1" placeholder="RacingNews365">
                    </div>
                    <div class="form-group">
                      <label for="sito2"></label>
                      <input type="number" step="0.5" class="form-control form-control-sm" name="sito2" placeholder="VociDiCittá">
                    </div>
                    <div class="form-group">
                      <label for="sito3"></label>
                      <input type="number" step="0.5" class="form-control form-control-sm" name="sito3" placeholder="MotorBox">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_send" name="add_res_pag">Invia</button>
                        </div>
                  </form>
                    </div>
                    
                  </div>
                </div>
              </div>

              <!----Modal aggiungi ritirati ---->
              <div class="modal fade" id="modaladdrit" tabindex="-1" aria-labelledby="modaladdrit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modaladdrit">Aggiungi Ritirato</h5>
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
                      <label for="pilota"></label>
                      <input list="list_driver" class="form-control form-control-sm" name="pilota" placeholder="Pilota">
                    </div>
                    <div class="form-group">
                      <label for="tipo"></label>
                      <input list="list_typerit" step="0.5" class="form-control form-control-sm" name="tipo" placeholder="Tipo">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_send" name="add_rit">Invia</button>
                    </div>
                  </form>
                    </div>
                  </div>
                </div>
              </div>

              <!----Modal calcolo punteggi----->
              <div class="modal fade" id="modalcalcolo" tabindex="-1" aria-labelledby="modalcalcolo" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalcalcolo">Calcolo Punteggi</h5>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn_send" name="calcolo_punti">Invia</button>
                    </div>
                  </form>
                    </div>
                  </div>
                </div>
              </div>


             <?php  } } ?>

    </div>
  </div>
</header>




	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>