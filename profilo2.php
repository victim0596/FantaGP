<?php

$textPtTotali="";
$textPtPron="";
$textPtPag="";
if (isset($_SESSION['session_id'])){
	$id_p = $_SESSION['session_user'];
    include 'connection.php';
    if (mysqli_connect_error()) {
        die('Errore di connessione (' . mysqli_connect_error() . ')');
    }
    $sql = "SELECT id_p, SUM(punti) as puntiTot, SUM(punti_pag) as puntiPag, SUM(punti_pron) as puntiPron from pronostici where id_p= '$id_p' GROUP BY id_p";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $conn->close();
    $textPtTotali = $row[1];
    $textPtPron = $row[3];
    $textPtPag = $row[2];  
}
?>