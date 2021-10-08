<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_quali'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $qp1 = filter_input(INPUT_POST, 'qp1');
        $qp2 = filter_input(INPUT_POST, 'qp2');
        $qp3 = filter_input(INPUT_POST, 'qp3');
        if (!empty($nome_gara) and !empty($qp1) and !empty($qp2) and !empty($qp3)) {
            include 'newconn.php';
            try{
                $sql = "SELECT * from risultati where nome_gara=:nomeGara";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if(empty($result)){
                    $sql = "INSERT INTO risultati (nome_gara,qp1,qp2,qp3) values (:nomeGara,:qp1,:qp2,:qp3)";
                    $sth = $pdo->prepare($sql);
                    $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':qp1', $qp1, PDO::PARAM_STR);
                    $sth->bindValue(':qp2', $qp2, PDO::PARAM_STR);
                    $sth->bindValue(':qp3', $qp3, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                }else {
                    $text = "Hai gia aggiunto il risultato delle qualifiche";
                }
            }catch (PDOException $e) {
                $text = $e->getMessage();
                exit();
            }
        } else {
            $text = "Non hai messo tutti i dati";
        }
    }
} else {
    $text = "Effettua prima il login";
}
