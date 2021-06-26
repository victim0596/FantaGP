<?php
session_start();

if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST['login'])) {
    $n_ut = filter_input(INPUT_POST, 'n_utente');
    $n_psw = filter_input(INPUT_POST, 'psw');
    if (!empty($n_ut) || !empty($n_psw)) {
        include 'connection.php';
        if (mysqli_connect_error()) {
            die('Errore di connessione (' . mysqli_connect_error() . ')');
        } else {
            //$link=mysql_connect($host, $dbusername, $dbpassword); php 5
            //mysql_select_db($dbname,$link); php 5
            $sql = "SELECT * from utenti where username='$n_ut' and password='$n_psw'";
            $result = $conn->query($sql);
            $num_row = $result->num_rows;
            if ($num_row == 1) {
                session_regenerate_id();
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_user'] = $n_ut;
                header('Location: index.php');
                $conn->close();
                exit;
            } else {
                echo "Hai inserito dati errati";
                $conn->close();
            }
        }
        $conn->close();
    } else {
        echo "Non hai messo tutti i dati";
        die();
    }
}
