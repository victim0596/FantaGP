<?php
$text = "";
if (isset($_SESSION['session_id'])) {
    if (isset($_POST['invia_quali'])) {
        $id_p = $_SESSION['session_user'];
        $nome_gara = filter_input(INPUT_POST, 'nome_gara');
        $qp1 = filter_input(INPUT_POST, 'qp1');
        $qp2 = filter_input(INPUT_POST, 'qp2');
        $qp3 = filter_input(INPUT_POST, 'qp3');
        if (!empty($nome_gara) and !empty($qp1) and !empty($qp2) and !empty($qp3)) {
            include 'connection.php';
            include 'time_limit.php';
            if (mysqli_connect_error()) {
                die('Errore di connessione (' . mysqli_connect_error() . ')');
            } else {
                if (check_date_quali($nome_gara) == 1) {
                    //$link=mysql_connect($host, $dbusername, $dbpassword); per php 5
                    //mysql_select_db($dbname,$link); per php 5
                    $sql = "SELECT * from pronostici where id_p='$id_p' and nome_gara='$nome_gara'";
                    $result = $conn->query($sql);
                    $num_row = $result->num_rows;
                    if ($num_row == 1) {
                        $data = $result->fetch_assoc();
                        //se é gia presente il pronostico della gara, ma non delle qualifiche
                        if (empty($data['qp1'])) {
                            $sql = "UPDATE pronostici set qp1='$qp1',qp2='$qp2',qp3='$qp3' where id_p='$id_p' and nome_gara='$nome_gara'";
                            if ($conn->query($sql)) {
                                $text = "I pronostici sono stati inseriti correttamente";
                            } else {
                                $text = "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            $text = "Hai giá inserito i pronostici delle qualifiche";
                        }
                    } else {
                        $sql = "INSERT INTO pronostici (id_p,nome_gara,qp1,qp2,qp3,punti) values ('$id_p','$nome_gara','$qp1','$qp2','$qp3', 0)";
                        if ($conn->query($sql)) {
                            $text = "I pronostici sono stati inseriti correttamente";
                        } else {
                            $text = "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                } else {
                    $text = "Tempo limite superato";
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
include 'pronostici_race.php';
