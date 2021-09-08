<?php

include 'connection.php';
$sql = filter_input(INPUT_POST, 'queryText');
$result = $conn->query($sql);
if(filter_input(INPUT_POST, 'metodo') == "SELECT"){
    while ($row = $result->fetch_assoc()) {
        print_r($row);
        echo "<br>";
    }
}
$conn->close();