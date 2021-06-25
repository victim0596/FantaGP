<?php

$text="";
$nomegara = "Francia";
$nomeutente = "";
$qualifica1="";
$qualifica2="";
$qualifica3="";
$gara1="";
$gara2="";
$gara3="";
$giroveloce="";
$nrit="";
$sc="";
$vsc="";
if (isset($_SESSION['session_id'])){
	$nomeutente= $_SESSION['session_user'];
    include 'connection.php';
    if(mysqli_connect_error()){
        die('Errore di connessione ('.mysqli_connect_error().')');       
       }
    else{
        $sql="SELECT * from pronostici where id_p='$nomeutente' and nome_gara='$nomegara'";
        $result=$conn->query($sql);
        $num_row=$result->num_rows;
        if($num_row==0) $text="Non ci sono risultati per questa gara";
        else{
            $result=$conn->query($sql);
            $data = $result->fetch_assoc();
            $qualifica1=$data['qp1'];
            $qualifica2=$data['qp2'];
            $qualifica3=$data['qp3'];
            if(!empty($data['gp1'])){
                $gara1=$data['gp1'];
                $gara2=$data['gp2'];
                $gara3=$data['gp3'];
                $giroveloce=$data['giro_veloce'];
                $nrit=$data['n_ritirati'];
                $sc=$data['SC'];
                $vsc=$data['VSC'];
            }        
            
              }
    }
    $conn->close();   
}   	

?>