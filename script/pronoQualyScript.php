<?php
require('./classes/FormClass.php');
require('./classes/QueryClass.php');
require('./script/time_limit.php');



if (isset($_SESSION['session_id'])) {
    if (isset($_POST['invia_quali'])) {
        $id_p = $_SESSION['session_user'];
        $nome_gara = $_POST['nome_gara'];
        $qp1 = $_POST['qp1'];
        $qp2 = $_POST['qp2'];
        $qp3 = $_POST['qp3'];
        try {
            $form = new FormCheck($nome_gara);
            if (check_date_quali($nome_gara)) {
                $checkQualy = $form->checkQualyForm($qp1, $qp2, $qp3);
                if ($checkQualy['boolValue']) {
                    $qExec = new QExec();
                    $text = $qExec->insertPronoQualy($id_p, $nome_gara, $qp1, $qp2, $qp3);
                } else $text = $checkQualy['error'];
            } else {
                $text = "Tempo limite superato";
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        }
    }
} else $text = "Effettua prima il login";

