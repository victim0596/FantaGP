
<?php

$dsn = 'mysql:dbname=fantagpc_fantagp2021;host=localhost';
$user = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    printf("Connection failed: %s \n", $e->getMessage());
    exit();
}