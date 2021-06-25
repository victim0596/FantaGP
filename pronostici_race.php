<?php

if (isset($_SESSION['session_id'])){
	if(isset($_POST['invia_race'])){
	$id_p= $_SESSION['session_user'];
	$nome_gara=filter_input(INPUT_POST, 'nome_gara');
	$gp1=filter_input(INPUT_POST, 'gp1');
	$gp2=filter_input(INPUT_POST, 'gp2');
	$gp3=filter_input(INPUT_POST, 'gp3');
	$giro_veloce=filter_input(INPUT_POST, 'giro_veloce');
	$n_ritirati=filter_input(INPUT_POST, 'n_ritirati');
	$VSC=filter_input(INPUT_POST, 'vsc');
	$SC=filter_input(INPUT_POST, 'sc');
	if(!empty($nome_gara) and !empty($gp1) and !empty($gp2) and !empty($gp3) and !empty($giro_veloce) and $n_ritirati>=0 and !empty($VSC) and !empty($SC)){

		include 'connection.php';
		include 'time_limit.php';
		if(mysqli_connect_error()){
			die('Errore di connessione ('.mysqli_connect_error().')');
		}
		else {
			if(check_date_race($nome_gara)==1){
			//$link=mysql_connect($host, $dbusername, $dbpassword); php 5
			//mysql_select_db($dbname,$link); php 5
			$sql="SELECT * from pronostici where id_p='$id_p' and nome_gara='$nome_gara'";
			$result=$conn->query($sql);
			$num_row=$result->num_rows;
			if($num_row==1){
				$data=$result->fetch_assoc();
				//se é gia presente il pronostico delle qualifiche, ma non della gara
				if(empty($data['gp1'])){
					$sql="UPDATE pronostici set gp1='$gp1',gp2='$gp2',gp3='$gp3', giro_veloce='$giro_veloce', n_ritirati='$n_ritirati', vsc='$VSC', sc='$SC' where id_p='$id_p' and nome_gara='$nome_gara'";
					if($conn->query($sql))	$text= "I pronostici sono stati inseriti correttamente";
					else $text= "Error: ".$sql."<br>".$conn->error;
					$conn->close();
				}
				else $text= "Hai giá inserito i pronostici della gara";
			} 
			else{
				$sql="INSERT INTO pronostici (id_p,nome_gara,gp1,gp2,gp3,giro_veloce,n_ritirati,vsc,sc) values ('$id_p','$nome_gara','$gp1','$gp2', '$gp3','$giro_veloce', '$n_ritirati', '$VSC','$SC')";
				if($conn->query($sql))	$text= "I pronostici sono stati inseriti correttamente";
				else $text= "Error: ".$sql."<br>".$conn->error;
				$conn->close();
			}
		}
		else $text= "Tempo limite superato";
		}
		$conn->close();
	}
	else $text= "Non hai messo tutti i dati";
	}
}
else $text= "Effettua prima il login";


?>