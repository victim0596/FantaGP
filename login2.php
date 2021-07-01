<?php
session_start();

if (isset($_SESSION['session_id'])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST['login'])) {
    $n_ut = $_POST['n_utente'];
    $n_psw = filter_input(INPUT_POST, 'psw');
    if (!empty($n_ut) && !empty($n_psw)) {
        include 'connection.php';
        if (mysqli_connect_error()) {
            die('Errore di connessione (' . mysqli_connect_error() . ')');
        } else {
            $sql = "SELECT username,password from utenti where username= ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $n_ut);
            $stmt->execute();
            $stmt->store_result();
            $num_row = $stmt->num_rows;
            if ($num_row == 1) {
                $stmt->bind_result($id, $password);
	            $stmt->fetch();
                $salt = "0x618f0554f66153b508be1813c76c26bb";
                $psw_salted = hash_hmac("sha256", $n_psw, $salt);
                if(password_verify($psw_salted,$password)){
                    session_regenerate_id();
                    $_SESSION['session_id'] = session_id();
                    $_SESSION['session_user'] = $n_ut;
                    header('Location: index.php');
                    exit;
                } else echo "Hai inserito una password sbagliata";
            } else {
                echo "Hai inserito dati errati";
            }
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "Non hai messo tutti i dati";
        die();
    }
}
