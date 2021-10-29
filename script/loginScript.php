<?php

require("./classes/LoginClass.php");


if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST['login'])) {
    $n_ut_input = $_POST['n_utente'];
    $n_psw = $_POST['psw'];
    $login = new LoginAuth($n_ut_input, $n_psw);
    $loginCheck = $login->loginCheckFormat();
    try{
        if ($loginCheck['boolValue']) {
            $queryEx = new QExec();
            $loginAuth = $queryEx->checkDbAuth($n_ut_input, $n_psw);
            if (!$loginAuth)  $text = "Dati errati";
            else {
                session_start();
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_user'] = $n_ut_input;
                header('Location: profilo.php');
            }
        } else  $text = $loginCheck['error'];
    }catch(Exception $ex){
        $text = $ex->getMessage();
    }  
}
