<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_pag'])) {
        $nome_gara = $_POST['nome_gara'];
        $pilota = $_POST['pilota'];
        $sito1 = $_POST['sito1'];
        $sito2 = $_POST['sito2'];
        $sito3 = $_POST['sito3'];
        try{
            $form = new FormCheck($nome_gara);
            $checkPagelle = $form->checkAddPagelleForm($pilota,$sito1, $sito2, $sito3);
            if($checkPagelle['boolValue']){
                $qExec = new QExec();
                $text = $qExec->insertPagelle($nome_gara, $pilota, $sito1, $sito2, $sito3);
            }else {
                $text = $checkPagelle['error'];
            }
        }catch(Exception $ex){
            $text = $ex->getMessage();
        }
    }
} else {
    $text = "Effettua prima il login";
}
