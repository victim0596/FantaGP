<?php


/**
 * DBConn
 * This class is the main class for the connection of db, contain all the info for connecting to database 
 */
class DBConn
{
        
    /**
     * dbConnection
     * This method is the only method for establishing the connection with database
     * @return PDO
     */
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
