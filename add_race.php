<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_race'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $gp1 = filter_input(INPUT_POST, 'gp1');
        $gp2 = filter_input(INPUT_POST, 'gp2');
        $gp3 = filter_input(INPUT_POST, 'gp3');
        $giro_veloce = filter_input(INPUT_POST, 'giro_veloce');
        $n_ritirati = filter_input(INPUT_POST, 'n_ritirati');
        $VSC = filter_input(INPUT_POST, 'vsc');
        $SC = filter_input(INPUT_POST, 'sc');
        if (!empty($nome_gara) and !empty($gp1) and !empty($gp2) and !empty($gp3) and !empty($giro_veloce) and $n_ritirati >= 0 and !empty($VSC) and !empty($SC)) {
            include 'newconn.php';
            try{
                $sql = "SELECT * from risultati where nome_gara=:nomeGara and gp1 is not null";
                $sth = $pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                if(empty($result)){
                    $sql = "UPDATE risultati set gp1=:gp1, gp2=:gp2, gp3=:gp3, giro_veloce=:giro_veloce, n_ritirati=:n_ritirati, vsc=:VSC, sc=:SC where nome_gara=:nomeGara";
                    $sth = $pdo->prepare($sql);
                    $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':gp1', $gp1, PDO::PARAM_STR);
                    $sth->bindValue(':gp2', $gp2, PDO::PARAM_STR);
                    $sth->bindValue(':gp3', $gp3, PDO::PARAM_STR);
                    $sth->bindValue(':giro_veloce', $giro_veloce, PDO::PARAM_STR);
                    $sth->bindValue(':n_ritirati', $n_ritirati, PDO::PARAM_INT);
                    $sth->bindValue(':VSC', $VSC, PDO::PARAM_STR);
                    $sth->bindValue(':SC', $SC, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                }else {
                    $text = "Hai giá inserito i risultati della gara";
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
