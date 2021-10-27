<?php

require("./classes/DbClass.php");

class LoginAuth extends DBConn
{

    private string $username;
    private string $password;

    public function __construct(string $user, string $psw)
    {
        $this->username = $user;
        $this->password = $psw;
    }

    public function isEmpty(): bool
    {
        if (empty($this->username) || empty($this->password)) return false;
        else return true;
    }

    public function isValidUser(): bool
    {
        if (preg_match("/^[a-z0-9]*$/i", $this->username) === 1) {
            return true;
        } else return false;
    }

    public function isValidPsw(): bool
    {
        if (preg_match("/^[a-z0-9]/i", $this->password) === 1) {
            return true;
        } else return false;
    }

    public function checkDbAuth(): bool
    {
        $conn = new DBConn();
        $pdo = $conn->dbConnection();
        $sql = "SELECT username,password from utenti where username= :username";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $password = $result['password'];
            $salt = "0x618f0554f66153b508be1813c76c26bb";
            $psw_salted = hash_hmac("sha256", $this->password, $salt);
            if (password_verify($psw_salted, $password)) {
                return true;
            }
        }
        return false;
    }

    public function loginCheckFormat(): array
    {
        $arrayCheck['error'] = null;
        $arrayCheck['boolValue'] = true;
        if (!$this->isEmpty()) {
            $arrayCheck['error'] = "Campo vuoto";
            $arrayCheck['boolValue'] = false;
        }
        if (!$this->isValidUser()) {
            $arrayCheck['error'] = "Nome utente non del formato valido";
            $arrayCheck['boolValue'] = false;
        };
        if (!$this->isValidPsw()) {
            $arrayCheck['error'] = "Password non del formato valido";
            $arrayCheck['boolValue'] = false;
        };
        return $arrayCheck;
    }
}
