<?php

include 'connection.php';

//$link=mysql_connect($host, $dbusername, $dbpassword); per php 5
//mysql_select_db($dbname,$link); per php 5

/* CLASSIFICA GENERALE */
$sql = "SELECT id_p, sum(punti) as puntiGen from pronostici GROUP BY id_p order by sum(punti) desc";
$result = $conn->query($sql);
$arrayClassificaGenerale = [];
while($row = $result->fetch_assoc()){
    array_push($arrayClassificaGenerale, $row);
}


/* CLASSIFICA PAGELLE */
$sql2 = "SELECT id_p, sum(punti_pag) as puntiPag from pronostici GROUP BY id_p order by sum(punti_pag) desc";
$result2 = $conn->query($sql2);
$arrayClassificaPagelle = [];
while($row2 = $result2->fetch_assoc()){
    array_push($arrayClassificaPagelle, $row2);
}


/* CLASSIFICA PRONOSTICI */
$sql3 = "SELECT id_p, sum(punti_pron) as puntiPron from pronostici GROUP BY id_p order by sum(punti_pron) desc";
$result3 = $conn->query($sql3);
$arrayClassificaPronostici = [];
while($row3 = $result3->fetch_assoc()){
    array_push($arrayClassificaPronostici, $row3);
}


$conn->close();
