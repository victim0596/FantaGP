<?php

$text = "";
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['invia_quali'])) {
        $id_p = $_SESSION['session_user'];
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $qp1 = filter_input(INPUT_POST, 'qp1');
        $qp2 = filter_input(INPUT_POST, 'qp2');
        $qp3 = filter_input(INPUT_POST, 'qp3');
        include 'inputValid.php';
        if (!empty($nome_gara) and !empty($qp1) and !empty($qp2) and !empty($qp3) and $checkVarQualy) {
            include 'newconn.php';
            include 'time_limit.php';
            if (check_date_quali($nome_gara) == 1) {
                try{
                    $sql = "SELECT * from pronostici where id_p=:id_p and nome_gara=:nome_gara";
                    $sth = $pdo->prepare($sql);
                    $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                    $sth->execute();
                    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
                    //se é presente il pronostico
                    if (!empty($data)) {
                        //aggiorna i dati
                        $sql = "UPDATE pronostici set qp1=:qp1,qp2=:qp2,qp3=:qp3 where id_p=:id_p and nome_gara=:nome_gara";
                        $sth = $pdo->prepare($sql);
                        $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                        $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                        $sth->bindValue(':qp1', $qp1, PDO::PARAM_STR);
                        $sth->bindValue(':qp2', $qp2, PDO::PARAM_STR);
                        $sth->bindValue(':qp3', $qp3, PDO::PARAM_STR);
                        $sth->execute();
                        $text = "I dati sono stati inseriti correttamente";
                    } else {
                        $text = "Non hai ancora inserito nessun pronostico";
                    }
                } catch (PDOException $e) {
                    $text = $e->getMessage();
                    exit();
                } 
            } else {
                $text = "Tempo limite superato, non puoi piú modificare i pronostici";
            }
        } else {
            if($checkVarQualy == false) $text = "Hai inserito uno stesso pilota in uno degli altri campi";
            else $text = "Non hai messo tutti i dati";
        }
    }
} else {
    $text = "Effettua prima il login";
}
