<?php

require('./classes/FormClass.php');
require('./classes/QueryClass.php');


if (isset($_SESSION['session_id'])) {
    $text1 = "";
    if (isset($_POST['add_rit'])) {
        $nome_gara = $_POST['nome_gara'];
        $nome_pilota = $_POST['pilota'];
        $tipo = $_POST['tipo'];
        try{
            $form = new FormCheck($nome_gara);
            $checkRitirati = $form->checkAddRitiratiForm($nome_pilota,$tipo);
            if($checkRitirati['boolValue']){
                $qExec = new QExec();
                $text = $qExec->insertRitirati($nome_gara,$nome_pilota,$tipo);
            }else{
                $text = $checkRitirati['error'];
            }
        }catch(Exception $ex){
            $text = $ex->getMessage();
        }
    }
} else {
    $text = "Effettua prima il login";
}
