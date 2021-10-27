<?php

require("./classes/LoginClass.php");


if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST['login'])) {
    $n_ut_input = $_POST['n_utente'];
    $n_psw = filter_input(INPUT_POST, 'psw');
    $login = new LoginAuth($n_ut_input, $n_psw);
    if ($login->loginCheckFormat()['boolValue']) {
        if (!$login->checkDbAuth())  $text = "Dati errati";
        else {
            session_start();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $n_ut_input;
            header('Location: profilo.php');
        }
    } else  $text = $login->loginCheckFormat()['error'];
}
