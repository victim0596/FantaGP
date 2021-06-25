<?php
session_start();
if (isset($_SESSION['session_id'])){
	if(isset($_POST['add_res_pag'])){
	$id_p= $_SESSION['session_user'];
	$nome_gara=filter_input(INPUT_POST, 'nome_gara');
	$pilota=filter_input(INPUT_POST, 'pilota');
	$sito1=filter_input(INPUT_POST, 'sito1');
	$sito2=filter_input(INPUT_POST, 'sito2');
	$sito3=filter_input(INPUT_POST, 'sito3');
	if(!empty($id_p) and !empty($nome_gara) and !empty($pilota) and !empty($sito1) and !empty($sito2) and  !empty($sito3)){

		include 'connection.php';
		if(mysqli_connect_error()){
			die('Errore di connessione ('.mysqli_connect_error().')');
		}
		else {
			//$link=mysql_connect($host, $dbusername, $dbpassword);  php 5
		//	mysql_select_db($dbname,$link);  php 5
			$sql="SELECT * from pagelle where nome_gara='$nome_gara' and pilota='$pilota'";
			$result=$conn->query($sql);
			$num_row=$result->num_rows;
			//se é presente la pagella
			if($num_row==1){
				$text= "Hai gia inserito la pagella di questo pilota";
				}
			else{
				$sql="INSERT INTO pagelle (nome_gara,pilota,sito1,sito2,sito3) values ('$nome_gara','$pilota','$sito1','$sito2','$sito3')";
				if($conn->query($sql)){
					$text= "I dati sono stati inseriti correttamente";
						}
				else{
					$text= "Error: ".$sql."<br>".$conn->error;
				}
				
			}
		  }
		  $conn->close();
		}
	else{
		$text= "Non hai messo tutti i dati";
	}
  }
}

else{
	$text= "Effettua prima il login";
}

?>