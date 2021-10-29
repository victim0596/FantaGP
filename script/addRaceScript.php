<?php

if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_race'])) {
        $nome_gara = $_POST['nome_gara'];
        $gp1 = $_POST['gp1'];
        $gp2 = $_POST['gp2'];
        $gp3 = $_POST['gp3'];
        $giro_veloce = $_POST['giro_veloce'];
        $n_ritirati = $_POST['n_ritirati'];
        $VSC = $_POST['vsc'];
        $SC = $_POST['sc'];
        try{
            $form = new FormCheck($nome_gara);
            $checkAddRace = $form->checkRaceForm($gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
            if($checkAddRace['boolValue']){
                $qExec = new QExec();
                $text = $qExec->insertResultRace($nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
            } else $text = $checkAddRace['error'];
        }catch(Exception $ex){
            $text = $ex->getMessage();
        }
    }
} else {
    $text = "Effettua prima il login";
}
