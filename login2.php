<?php

if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST['login'])) {
    $n_ut_input = $_POST['n_utente'];
    $n_ut = str_replace(" ", "", $n_ut_input);
    $n_psw = filter_input(INPUT_POST, 'psw');
    if (!empty($n_ut) && !empty($n_psw)) {
        include 'newconn.php';
        try{
            $sql = "SELECT username,password from utenti where username= :username";
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':username', $n_ut, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result) && count($result) == 1){
                $password = $result[0]['password'];
                $salt = "0x618f0554f66153b508be1813c76c26bb";
                $psw_salted = hash_hmac("sha256", $n_psw, $salt);
                if (password_verify($psw_salted, $password)) {
                    session_start();
                    $_SESSION['session_id'] = session_id();
                    $_SESSION['session_user'] = $n_ut;
                    header('Location: profilo.php');
                    exit;
                } else {
                    echo "Hai inserito una password sbagliata";
                }
            } else {
                echo "Hai inserito dati errati";
            }       
        } catch (PDOException $e) {
                $text = $e->getMessage();
                exit();
            }
    } else {
        echo "Non hai messo tutti i dati";
        die();
    }
}
