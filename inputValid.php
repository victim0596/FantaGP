<?php

$checkVarQualy = false;
$checkVarRace = false;
$arrayDriver = ["Hamilton", "Bottas", "Verstappen", "Perez", "Sainz", "Leclerc", "Ricciardo", "Norris", "Alonso", "Ocon",
"Giovinazzi", "Raikkonen", "Gasly", "Tsunoda", "Russel", "Latifi", "Mazepin", "Schumacher", "Vettel", "Stroll"];


if($qp1 == $qp2 || $qp1 == $qp3 || $qp2 == $qp3) {
    $text =  "Hai inserito uno stesso pilota in uno degli altri campi";
}
else {
    if(in_array($qp1, $arrayDriver) && in_array($qp2, $arrayDriver) && in_array($qp3, $arrayDriver))  {
        $text= "";
        $checkVarQualy = true;
    }
    else  $text="Hai inserito un pilota non esistente/Campo vuoto";
}


if($gp1 == $gp2 || $gp1 == $gp3 || $gp2 == $gp3) {
    $text =  "Hai inserito uno stesso pilota in uno degli altri campi";
}
else {
    if(in_array($gp1, $arrayDriver) && in_array($gp2, $arrayDriver) && in_array($gp3, $arrayDriver) && in_array($giro_veloce, $arrayDriver))  {
        $text= "";
        $checkVarRace = true;
    }
    else  $text="Hai inserito un pilota non esistente/Campo vuoto";
}

