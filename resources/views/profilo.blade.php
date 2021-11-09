<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>FantaGP 2021</title>
  <meta name="description" content="Sito per il fantaGP">
  <meta name="author" content="Oliver Terzo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css?n=1.03">
  <link rel="stylesheet" href="/css/pronostici.css?n=1.01">
  <link rel="stylesheet" href="/css/profilo.css?n=1.03">
  <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="shortcut icon" href="/logo.ico" />
</head>

<body>

  <!----NAVBAR --->
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <a class="navbar-brand" href="index.php">
      <img src="/element/logo_salvo_bianco.png" alt="" width="100" height="44" class="d-inline-block align-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link" href="/classifica">Classifica</a>
        <a class="nav-link" href="/statistiche">Statistiche</a>
        <a class="nav-link" href="/pronostici">Pronostici</a>
        <?php if (isset($sessionUser)) { ?>
          <a class="nav-link" href="/profilo"><?= e($sessionUser); ?></a>
        <?php } else { ?>
          <a class="nav-link" href="/login">Login</a><?php } ?>
      </div>
    </div>
  </nav>

  <div class="accordion" id="accordionExample">
    <div>
      <h2 class="accordion-header" id="headingOne">
        <button class="buttondiv" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <img src="/element/down-chevron.png">
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <!--inserisci i div dei pulsanti -->
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalqualy">Modifica Pronostici Qualifica</div>
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalrace">Modifica Pronostici Gara</div>
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalpron">Riepilogo Pronostici</div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2 barraLaterale">
        <div class="containerOpzioni barra ">
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalqualy">Modifica Pronostici Qualifica</div>
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalrace">Modifica Pronostici Gara</div>
          <div class="mb-3 opzioniLaterali" data-bs-toggle="modal" data-bs-target="#modalpron">Riepilogo Pronostici</div>
        </div>
      </div>
      <div class="col-3" id="columnSpace"></div>
      <div class="col">
        <div class="profilo">
          <div class="row">
            <div class="col">
              <div class="row p-3">
                <div class="col-10">
                  <img src="/img/piloti/Alonso.png" class="pilotino" id="pilotino1">
                  <div class="text-center" id="nomePilota1"></div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row p-3">
                <div class="col"></div>
                <div class="col-10">
                  <img src="/img/piloti/Alonso.png" class="pilotino" id="pilotino2">
                  <div class="text-center" id="nomePilota2"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider" id="nomeScuderia"></div>
          <div class="divider" id="nomeSquadra"></div>
          <div class="punteggi divider">
            <div class="row">
              <div class="col p-3 text-center">
                <div><?= e($textPtTotali); ?></div>
                <div>Punti totali</div>
              </div>
              <div class="col p-3 text-center">
                <div><?= e($textPtPron); ?></div>
                <div>Punti Pronostici</div>
              </div>
              <div class="col p-3 text-center">
                <div><?= e($textPtPag); ?></div>
                <div>Punti Pagelle</div>
              </div>
            </div>
          </div>
          <div class="footer text-center">
            <form method="post" action="/profilo/logout">
              @csrf
              <button type="submit" class="btn btn_logout" name="Log-out">Logout</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-3" id="columnSpace"></div>
    </div>
  </div>





  <!-- Modal Riepilogo pronostici -->
  <div class="modal fade" id="modalpron" tabindex="-1" aria-labelledby="modalpron" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalpron">Riepilogo Pronostici</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>

          </button>
        </div>
        <div class="modal-body">
          Gara:<span style="margin-left:20px;"><?= e($nomegara); ?></span></br>
          Qualifica P1:<span style="margin-left:20px;"><?= e($qualifica1); ?></span></br>
          Qualifica P2:<span style="margin-left:20px;"><?= e($qualifica2); ?></span></br>
          Qualifica P3:<span style="margin-left:20px;"><?= e($qualifica3); ?></span></br>
          Gara P1:<span style="margin-left:20px;"><?= e($gara1); ?></span></br>
          Gara P2:<span style="margin-left:20px;"><?= e($gara2); ?></span></br>
          Gara P3:<span style="margin-left:20px;"><?= e($gara3); ?></span></br>
          Giro veloce:<span style="margin-left:20px;"><?= e($giroveloce); ?></span></br>
          Numero ritirati:<span style="margin-left:20px;"><?= e($nrit); ?></span></br>
          VSC:<span style="margin-left:20px;"><?= e($vsc); ?></span></br>
          SC:<span style="margin-left:20px;"><?= e($sc); ?></span></br>
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
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="/profilo/modQualifica">
            @csrf
            <div class="form-group ">
              <label for="listrace"></label>
              <input list="list_race" class="form-control form-control-sm" name="nome_gara" placeholder="Nome Gara" required>
            </div>
            <div class="form-group">
              <label for="qp1"></label>
              <input list="list_driver" class="form-control form-control-sm" name="qp1" placeholder="Qualifica P1" required>
            </div>
            <div class="form-group">
              <label for="qp2"></label>
              <input list="list_driver" class="form-control form-control-sm" name="qp2" placeholder="Qualifica P2" required>
            </div>
            <div class="form-group">
              <label for="qp3"></label>
              <input list="list_driver" class="form-control form-control-sm" name="qp3" placeholder="Qualifica P3" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn_send" name="invia_quali">Invia</button>
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
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="/profilo/modGara">
            @csrf
            <div class="form-group ">
              <label for="listrace"></label>
              <input list="list_race" class="form-control form-control-sm" name="nome_gara" placeholder="Nome Gara" required>
            </div>
            <div class="form-group">
              <label for="gp1"></label>
              <input list="list_driver" class="form-control form-control-sm" name="gp1" placeholder="Gara P1" required>
            </div>
            <div class="form-group">
              <label for="gp2"></label>
              <input list="list_driver" class="form-control form-control-sm" name="gp2" placeholder="Gara P2" required>
            </div>
            <div class="form-group">
              <label for="gp3"></label>
              <input list="list_driver" class="form-control form-control-sm" name="gp3" placeholder="Gara P3" required>
            </div>
            <div class="form-group">
              <label for="giro_veloce"></label>
              <input list="list_driver" class="form-control form-control-sm" name="giro_veloce" placeholder="Giro Veloce" required>
            </div>
            <div class="form-group">
              <label for="n_ritirati"></label>
              <input list="n_rit" type="number" min="0" max="10" class="form-control form-control-sm" name="n_ritirati" placeholder="Numero ritirati" required>
            </div>
            <div class="form-group">
              <label for="vsc"></label>
              <input list="bool" class="form-control form-control-sm" name="vsc" placeholder="Virtual Safety Car" pattern="Si|No" required>
            </div>
            <div class="form-group">
              <label for="sc"></label>
              <input list="bool" class="form-control form-control-sm" name="sc" placeholder="Safety Car" pattern="Si|No" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn_send " name="invia_race">Invia</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>

  <datalist id="list_race">
    <option class="raceValue" value="Australia">
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
  <datalist id="listaMetodi">
    <option value="UPDATE"></option>
    <option value="SELECT"></option>
    <option value="INSERT"></option>
  </datalist>

  <!-- simboli messaggi -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>
  <!-- Alert -->

  <div class="alert alert-primary d-flex align-items-center classAlert" id="alert" role="alert">
    <div class="textProfile" id="txtAlert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
        <use xlink:href="#check-circle-fill" id="simbolID" />
      </svg>
      <?= e($text); ?>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="btnAlert"></button>
  </div>

  <script src="/js/Alert.js"></script>
  <script src="/js/profilo.js"></script>
  <script src="/js/pronoValidation.js"></script>
  <script src="/js/actualRace.js?n=1.0"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>