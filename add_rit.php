<?php

$text1 = "";
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_rit'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $nome_pilota = filter_input(INPUT_POST, 'pilota');
        $tipo = filter_input(INPUT_POST, 'tipo');
        if (!empty($nome_gara) and !empty($nome_pilota) and !empty($tipo)) {
            include 'connection.php';
            if (mysqli_connect_error()) {
                die('Errore di connessione (' . mysqli_connect_error() . ')');
            } else {
                //    $link=mysql_connect($host, $dbusername, $dbpassword);   php 5
                //    mysql_select_db($dbname,$link);   php 5
                $sql = "SELECT * from ritirati where nome_gara='$nome_gara' and nome_pilota='$nome_pilota' and tipo='$tipo'";
                $result = $conn->query($sql);
                $num_row = $result->num_rows;
                //se é presente il pronostico
                if ($num_row == 1) {
                    $text1 = "Hai giá inserito questo ritirato";
                } else {
                    $sql = "INSERT INTO ritirati (nome_gara,nome_pilota,tipo) values ('$nome_gara','$nome_pilota','$tipo')";
                    if ($conn->query($sql)) {
                        $text1 = "Aggiunto con successo";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
            $conn->close();
        } else {
            $text1 = "Non hai messo tutti i dati";
        }
    }
} else {
    $text = "Effettua prima il login";
}
