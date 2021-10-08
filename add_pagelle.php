<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_pag'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $pilota = filter_input(INPUT_POST, 'pilota');
        $sito1 = filter_input(INPUT_POST, 'sito1');
        $sito2 = filter_input(INPUT_POST, 'sito2');
        $sito3 = filter_input(INPUT_POST, 'sito3');
        if (!empty($nome_gara) and !empty($pilota) and !empty($sito1) and !empty($sito2) and !empty($sito3)) {
            include 'newconn.php';
            try {
                $sql = "SELECT * from pagelle where nome_gara=:nomeGara and pilota=:nomePilota";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':nomePilota', $pilota, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if (empty($result)) {
                    $sql = "INSERT INTO pagelle (nome_gara,pilota,sito1,sito2,sito3) values (:nomeGara,:nomePilota,:sito1,:sito2,:sito3)";
                    $sth = $pdo->prepare($sql);
                    $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':nomePilota', $pilota, PDO::PARAM_STR);
                    $sth->bindValue(':sito1', $sito1, PDO::PARAM_STR);
                    $sth->bindValue(':sito2', $sito2, PDO::PARAM_STR);
                    $sth->bindValue(':sito3', $sito3, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                } else {
                    $text = "Hai gia inserito la pagella di questo pilota";
                }
            } catch (PDOException $e) {
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
