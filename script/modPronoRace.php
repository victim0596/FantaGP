<?php


if (isset($_SESSION['session_id'])) {
    if (isset($_POST['invia_race'])) {
        $id_p = $_SESSION['session_user'];
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
            if(check_date_race($nome_gara)) {
                $checkRace = $form->checkRaceForm($gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
                if($checkRace['boolValue']){
                    $qExec = new QExec();
                    $text = $qExec->modRaceProno($id_p, $nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
                }else $text = $checkRace['error'];
            } else $text = "Tempo limite superato";
        }catch(Exception $ex){
            $text = $ex->getMessage();
        }
    }
}
