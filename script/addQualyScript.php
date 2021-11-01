<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_quali'])) {
        $nome_gara = $_POST['nome_gara'];
        $qp1 = $_POST['qp1'];
        $qp2 = $_POST['qp2'];
        $qp3 = $_POST['qp3'];
        try{
            $form = new FormCheck($nome_gara);
            $checkAddQualy = $form->checkQualyForm($qp1, $qp2, $qp3);
            if($checkAddQualy['boolValue']){
                $qExec = new QExec();
                $text = $qExec->insertResultQualy($nome_gara,$qp1,$qp2,$qp3);
            }else{
                $text = $checkAddQualy['error'];
            }
        }catch(Exception $ex){
            $text = $ex->getMessage(); 
        }
    }
} 
