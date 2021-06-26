<?php
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['add_res_quali'])) {
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $qp1 = filter_input(INPUT_POST, 'qp1');
        $qp2 = filter_input(INPUT_POST, 'qp2');
        $qp3 = filter_input(INPUT_POST, 'qp3');
        if (!empty($nome_gara) and !empty($qp1) and !empty($qp2) and !empty($qp3)) {
            include 'connection.php';
            if (mysqli_connect_error()) {
                die('Errore di connessione (' . mysqli_connect_error() . ')');
            } else {
                //    $link=mysql_connect($host, $dbusername, $dbpassword);  php 5
                //    mysql_select_db($dbname,$link);   php 5
                $sql = "SELECT * from risultati where nome_gara='$nome_gara'";
                $result = $conn->query($sql);
                $num_row = $result->num_rows;
                //se é presente il pronostico
                if ($num_row == 1) {
                    $text = "Hai gia aggiunto il risultato delle qualifiche";
                } else {
                    $sql = "INSERT INTO risultati (nome_gara,qp1,qp2,qp3) values ('$nome_gara','$qp1','$qp2','$qp3')";
                    if ($conn->query($sql)) {
                        $text = "I dati sono stati inseriti correttamente";
                    } else {
                        $text = "Error: " . $sql . "<br>" . $conn->error;
                    }

                }
            }
            $conn->close();
        } else {
            $text = "Non hai messo tutti i dati";
        }
    }
} else {
    $text = "Effettua prima il login";
}
