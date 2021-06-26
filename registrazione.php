<?php

	$nut= filter_input(INPUT_POST, 'n_utente');
	$npsw= filter_input(INPUT_POST, 'psw');
	if(!empty($nut) || !empty($npsw)){

		include 'connection.php';
		if(mysqli_connect_error()){
			die('Errore di connessione ('.mysqli_connect_error().')');
		}
		else{
		//	$link=mysql_connect($host, $dbusername, $dbpassword);
		//	mysql_select_db($dbname,$link);
			$sql="SELECT * FROM utenti WHERE username='$nut'";
			$result=$conn->query($sql);
			$num_row=$result->num_rows;
			if($num_row==1) {
				  echo "Questo nome utente é giá registrato";
			}
			else{
				$sql="INSERT INTO utenti (username,password) values ('$nut','$npsw')";
				if($conn->query($sql)){
					echo "Ti sei registrato con successo";
				}
				else{
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		$conn->close();
	}
	else{
		echo "Non hai messo tutti i dati";
		die();
	}


?>