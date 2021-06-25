<?php

//MODIFICARE RIGHE 69-117 E 246


	//funzione per il calcolo dei punti dei pronostici
	function calcolo_punti_pronostici($nome_gara, $nome_utente){
	  include 'connection.php';
      if(mysqli_connect_error()){
		die('Errore di connessione ('.mysqli_connect_error().')');
	  }
	  else{
		//  $link=mysql_connect($host, $dbusername, $dbpassword);  php5
		//  mysql_select_db($dbname,$link);  php5
		  $punti=0.0;
	      $sql="SELECT * from pronostici where id_p='$nome_utente' and nome_gara='$nome_gara'";
		  $result=$conn->query($sql);
	      $data = $result->fetch_assoc();
	    //memorizzo tutti i pronostici di utente[i] in delle variabili		       
	      $qualifica1=$data['qp1'];
	      $qualifica2=$data['qp2'];
	      $qualifica3=$data['qp3'];
	      $gara1=$data['gp1'];
	      $gara2=$data['gp2'];
	      $gara3=$data['gp3'];
	      $giroveloce=$data['giro_veloce'];
	      $nrit=$data['n_ritirati'];
	      $sc=$data['SC'];
	      $vsc=$data['VSC'];
	    //query per risultati
	      $sql="SELECT * from risultati where nome_gara='$nome_gara'";
		  $result=$conn->query($sql);
	      $data = $result->fetch_assoc();
	    //memorizzo i risultati della gara in delle variabili  
	      $qualifica1_risultati=$data['qp1'];
	      $qualifica2_risultati=$data['qp2'];
	      $qualifica3_risultati=$data['qp3'];
	      $gara1_risultati=$data['gp1'];
	      $gara2_risultati=$data['gp2'];
	      $gara3_risultati=$data['gp3'];
	      $giroveloce_risultati=$data['giro_veloce'];
	      $nrit_risultati=$data['n_ritirati'];
	      $sc_risultati=$data['SC'];
	      $vsc_risultati=$data['VSC'];
	      //calcolo punti qualifiche
	      if($qualifica1==$qualifica1_risultati && !empty($qualifica1)) $punti=$punti+10;
	      if($qualifica2==$qualifica2_risultati && !empty($qualifica2)) $punti=$punti+8;
	      if($qualifica3==$qualifica3_risultati && !empty($qualifica3)) $punti=$punti+5;
	      if($qualifica1==$qualifica1_risultati && $qualifica2==$qualifica2_risultati && $qualifica3==$qualifica3_risultati && !empty($qualifica1) && !empty($qualifica2) && !empty($qualifica3)) $punti=$punti+10;
	      //calcolo punti gara
	      if($gara1==$gara1_risultati && !empty($gara1)) $punti=$punti+15;
	      if($gara2==$gara2_risultati && !empty($gara2)) $punti=$punti+10;
	      if($gara3==$gara3_risultati && !empty($gara3)) $punti=$punti+8;
	      if($gara1==$gara1_risultati && $gara2==$gara2_risultati && $gara3==$gara3_risultati && !empty($gara1) && !empty($gara2) && !empty($gara3)) $punti=$punti+20;
	      //calcolo punti giro veloce
	      if($giroveloce==$giroveloce_risultati && !empty($giroveloce)) $punti=$punti+20;
	      //calcolo punti n_rit
	      if($nrit==$nrit_risultati && !empty($nrit)) $punti=$punti+25;
	      //calcolo punti vsc e sc
		  if(!empty($sc) && !empty($vsc)){
			if($sc==$sc_risultati) $punti=$punti+5;
	      	else $punti=$punti-2;
			if($vsc==$vsc_risultati) $punti=$punti+3;
	     	else $punti=$punti-1;
		  } 
		 }
      return $punti;
	}

	//funzione per il calcolo dei punti delle pagelle
	function calcolo_punti_pagelle($nome_gara, $nome_utente){
		//switch che a seconda dell'utente prende i suoi piloti e scuderia, da modificare appena si fa l'asta
		switch ($nome_utente) {
			case 'Oliver':
				$pilota1="Gasly";
				$pilota2="Giovinazzi";
				$scuderia="RedBull";
				break;
			case 'Ciccio':
				$pilota1="Raikkonen";
				$pilota2="Alonso";
				$scuderia="Mercedes";
				break;
			case 'SpiritoBlu':
				$pilota1="Sainz";
				$pilota2="Vettel";
				$scuderia="Ferrari";
				break;
			case 'Dario':
				$pilota1="Tsunoda";
				$pilota2="Ocon";
				$scuderia="Mclaren";
				break;
			case 'gianpaolo':
				$pilota1="Leclerc";
				$pilota2="Bottas";
				$scuderia="Alpine";
				break;
			case 'Andrea':
				$pilota1="Russell";
				$pilota2="Schumacher";
				$scuderia="Aston-Martin";
				break;
			case 'Ermenegildo':
				$pilota1="Ricciardo";
				$pilota2="Latifi";
				$scuderia="Alpha Tauri";
				break;
			case 'Toto':
				$pilota1="Verstappen";
				$pilota2="Stroll";
				$scuderia="Haas";
				break;
			case 'alessiodom97':
				$pilota1="Norris";
				$pilota2="Perez";
				$scuderia="Alfa Racing";
				break;
			case 'pinguinoSquadracorse':

				$pilota1="Hamilton";
				$pilota2="Mazepin";
				$scuderia="Williams";
				break;
		}

		//switch che a seconda del valore della scuderia andrá a scegliere i piloti corretti di quella scuderia
		switch($scuderia){
			case 'Mercedes':
				$driver1="Hamilton";
				$driver2="Bottas";
				break;
			case 'Ferrari':
				$driver1="Leclerc";
				$driver2="Sainz";
				break;
			case 'RedBull':
				$driver1="Verstappen";
				$driver2="Perez";
				break;
			case 'Aston-Martin':
				$driver1="Vettel";
				$driver2="Stroll";
				break;
			case 'Mclaren':
				$driver1="Norris";
				$driver2="Ricciardo";
				break;
			case 'Alpine':
				$driver1="Alonso";
				$driver2="Ocon";
				break;
			case 'Williams':
				$driver1="Russell";
				$driver2="Latifi";
				break;
			case 'Haas':
				$driver1="Mazepin";
				$driver2="Schumacher";
				break;
			case 'Alpha Tauri':
				$driver1="Gasly";
				$driver2="Tsunoda";
				break;
			case 'Alfa Racing':
				$driver1="Raikkonen";
				$driver2="Giovinazzi";
				break;
		}

		include 'connection.php';
	    if(mysqli_connect_error()){
		  die('Errore di connessione ('.mysqli_connect_error().')');
		  }
	     else{
	     	//  $link=mysql_connect($host, $dbusername, $dbpassword); php 5
			//  mysql_select_db($dbname,$link);  php 5
			  $punti=0.0;
			  //query per il primo pilota e calcolo media con numero plastico
			  $sql="SELECT * from pagelle where pilota='$pilota1' and nome_gara='$nome_gara'";
			  $result=$conn->query($sql);
		      $data = $result->fetch_assoc();
		      $sito1_pilota1=$data['sito1'];
		      $sito2_pilota1=$data['sito2'];
		      $sito3_pilota1=$data['sito3'];
		      $media_pilota1=($sito1_pilota1+$sito2_pilota1+$sito3_pilota1)*1.3247;
		      //query per il secondo pilota e calcolo media con numero plastico
		      $sql="SELECT * from pagelle where pilota='$pilota2' and nome_gara='$nome_gara'";
			  $result=$conn->query($sql);
		      $data = $result->fetch_assoc();
		      $sito1_pilota2=$data['sito1'];
		      $sito2_pilota2=$data['sito2'];
		      $sito3_pilota2=$data['sito3'];
		      $media_pilota2=($sito1_pilota2+$sito2_pilota2+$sito3_pilota2)*1.3247;
		      //query per la scuderia e calcolo media con numero plastico
		      //query pilota 1 scuderia
		      $sql="SELECT * from pagelle where pilota='$driver1' and nome_gara='$nome_gara'";
			  $result=$conn->query($sql);
		      $data = $result->fetch_assoc();
		      $sito1_driver1_scuderia=$data['sito1'];
		      $sito2_driver1_scuderia=$data['sito2'];
		      $sito3_driver1_scuderia=$data['sito3'];
		      //query pilota 2 scuderia
		      $sql="SELECT * from pagelle where pilota='$driver2' and nome_gara='$nome_gara'";
			  $result=$conn->query($sql);
		      $data = $result->fetch_assoc();
		      $sito1_driver2_scuderia=$data['sito1'];
		      $sito2_driver2_scuderia=$data['sito2'];
		      $sito3_driver2_scuderia=$data['sito3'];
		      //media
		      $media_sito1=($sito1_driver1_scuderia+$sito1_driver2_scuderia)/2;
		      $media_sito2= ($sito2_driver1_scuderia+$sito2_driver2_scuderia)/2;
		      $media_sito3=($sito3_driver1_scuderia+$sito3_driver2_scuderia)/2;
		      $media_scuderia=($media_sito1+$media_sito2+$media_sito3)*1.3247;
		      //query per il controllo dei ritirati
		      //query pilota 1 ritirato qualifica
		      $sql="SELECT * from ritirati where nome_pilota='$driver1' and nome_gara='$nome_gara' and tipo='Qualifica'";
			  $result=$conn->query($sql);
         	  $num_row=$result->num_rows;
          	  if($num_row!=0) $media_scuderia=$media_scuderia-5;
          	   //query pilota 2 ritirato qualifica
		      $sql="SELECT * from ritirati where nome_pilota='$driver2' and nome_gara='$nome_gara' and tipo='Qualifica'";
			  $result=$conn->query($sql);
         	  $num_row=$result->num_rows;
          	  if($num_row!=0) $media_scuderia=$media_scuderia-5;
          	  //query pilota 1 ritirato gara
		      $sql="SELECT * from ritirati where nome_pilota='$driver1' and nome_gara='$nome_gara' and tipo='Gara'";
			  $result=$conn->query($sql);
         	  $num_row=$result->num_rows;
          	  if($num_row!=0) $media_scuderia=$media_scuderia-10;
          	   //query pilota 2 ritirato gara
		      $sql="SELECT * from ritirati where nome_pilota='$driver2' and nome_gara='$nome_gara' and tipo='Gara'";
			  $result=$conn->query($sql);
         	  $num_row=$result->num_rows;
          	  if($num_row!=0) $media_scuderia=$media_scuderia-10;
          	  //calcolo punti
          	  $punti=$media_pilota1+$media_pilota2+$media_scuderia;
	  	}
	  	return $punti;
	}

	$text="";
	include 'connection.php';
	if(isset($_POST['calcolo_punti'])){
	   $nome_gara=filter_input(INPUT_POST, 'nome_gara');
	   if(!empty($nome_gara)){
	   		//  $link=mysql_connect($host, $dbusername, $dbpassword);  php 5
			//  mysql_select_db($dbname,$link);		 php 5  
				$utenti=array("Oliver","Ciccio","SpiritoBlu","Dario","gianpaolo","Andrea","Ermenegildo","Toto","alessiodom97","pinguinoSquadracorse"); 
				for ($i=0; $i < 10; $i++) { 
					$punti_pronostici=calcolo_punti_pronostici($nome_gara,$utenti[$i]);
					$punti_pagelle=calcolo_punti_pagelle($nome_gara,$utenti[$i]);
					$punti_totali=number_format($punti_pronostici+$punti_pagelle,2);
					//query per aggiungere i punti tot al db
	     			$sql="UPDATE pronostici set punti='$punti_totali' where id_p='$utenti[$i]' and nome_gara='$nome_gara'";
		 			$result=$conn->query($sql);
					//query per aggiungere i punti solo pronostici al db
					$sql="UPDATE pronostici set punti_pron='$punti_pronostici' where id_p='$utenti[$i]' and nome_gara='$nome_gara'";
		 			$result=$conn->query($sql);
					//query per aggiungere i punti solo pagelle al db
					$sql="UPDATE pronostici set punti_pag='$punti_pagelle' where id_p='$utenti[$i]' and nome_gara='$nome_gara'";
		 			$result=$conn->query($sql);
				}
		   $conn->close();
	       $text="Punteggi calcolati con successo";
	      }
	      else $text="Non hai messo il nome della gara";
	     }
?>