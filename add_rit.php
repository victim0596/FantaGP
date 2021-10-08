<?php

$text1 = "";
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_rit'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $nome_pilota = filter_input(INPUT_POST, 'pilota');
        $tipo = filter_input(INPUT_POST, 'tipo');
        if (!empty($nome_gara) and !empty($nome_pilota) and !empty($tipo)) {
            include 'newconn.php';
            try{
                $sql = "SELECT * from ritirati where nome_gara=:nomeGara and nome_pilota=:nome_pilota and tipo=:tipo";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':nome_pilota', $nome_pilota, PDO::PARAM_STR);
                $sth->bindValue(':tipo', $tipo, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if(empty($result)){
                    $sql = "INSERT INTO ritirati (nome_gara,nome_pilota,tipo) values (:nomeGara,:nome_pilota,:tipo)";
                    $sth = $pdo->prepare($sql);
                    $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':nome_pilota', $nome_pilota, PDO::PARAM_STR);
                    $sth->bindValue(':tipo', $tipo, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                }else {
                    $text = "Hai giá inserito questo ritirato";
                }
            }catch (PDOException $e) {
                $text = $e->getMessage();
                exit();
            }
        } else {
            $text1 = "Non hai messo tutti i dati";
        }
    }
} else {
    $text = "Effettua prima il login";
}
