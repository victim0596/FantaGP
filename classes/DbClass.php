<?php


class DBConn
{

    protected function dbConnection(): PDO
    {
        try {
            $dsn = 'mysql:dbname=fantagpc_fantagp2021;host=localhost';
            $user = 'root';
            $password = '';
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;
        } catch (PDOException $ex) {
            printf("Connection failed: %s \n", $ex->getMessage());
            exit();
        }
    }
}
