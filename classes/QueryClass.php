<?php

require('./classes/DbClass.php');

/**
 * QExec
 * This is the main class for execute all the query of the website, extends the DBConn class
 */
class QExec extends DBConn
{
    
    public function __construct()
    {
        $this->conn = new DBConn();
        $this->pdo = $this->conn->dbConnection();
    }
    /**
     * checkDbAuth
     * This is the method that check the login date
     * This method is used by all the user
     * In this method there is also the salt used for cripting the dates in the database 
     * @param  string $usernameInput contain the username passed in login Form
     * @param  string $passwordInput contain the password passed in login Form
     * @return bool return true if the login date match with the date in the DB
     */
    public function checkDbAuth(string $usernameInput, string $passwordInput): bool
    {
        try {
            $sql = "SELECT username,password from utenti where username= :username";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':username', $usernameInput, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                $password = $result['password'];
                $salt = "0x618f0554f66153b508be1813c76c26bb";
                $psw_salted = hash_hmac("sha256", $passwordInput, $salt);
                if (password_verify($psw_salted, $password)) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $ex) {
            printf("%s \n", $ex->getMessage());
            return false;
        }
    }

    /**
     * insertPronoQualy
     * This method insert the prono date, taken from the page Pronostici in the Pronostici Qualifica form
     * This method is used by all the user
     * @param  string $id_p is the name of the user
     * @param  string $nome_gara is the name of the race
     * @param  string $qp1 is the driver placed in first place in Qualy Day
     * @param  string $qp2 is the driver placed in second place in Qualy Day
     * @param  string $qp3 is the driver placed in third place in Qualy Day
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertPronoQualy(string $id_p, string $nome_gara, string $qp1, string $qp2, string $qp3): string
    {

        try {
            $sql = "SELECT * from pronostici where id_p=:id_p and nome_gara=:nome_gara";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
            $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                //se é gia presente il pronostico della gara, ma non delle qualifiche
                if (empty($result[0]['qp1'])) {
                    $sql = "UPDATE pronostici set qp1=:qp1,qp2=:qp2,qp3=:qp3 where id_p=:id_p and nome_gara=:nome_gara";
                    $sth = $this->pdo->prepare($sql);
                    $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                    $sth->bindValue(':qp1', $qp1, PDO::PARAM_STR);
                    $sth->bindValue(':qp2', $qp2, PDO::PARAM_STR);
                    $sth->bindValue(':qp3', $qp3, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                } else {
                    $text = "Hai giá inserito i pronostici delle qualifiche";
                }
            } else {
                $sql = "INSERT INTO pronostici (id_p,nome_gara,qp1,qp2,qp3,punti) values (:id_p,:nome_gara,:qp1,:qp2,:qp3, 0)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                $sth->bindValue(':qp1', $qp1, PDO::PARAM_STR);
                $sth->bindValue(':qp2', $qp2, PDO::PARAM_STR);
                $sth->bindValue(':qp3', $qp3, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            }
        } catch (PDOException $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * insertPronoRace
     * this method insert the prono of the race, taken in the pronostici page in the Pronostici Gara form
     * This method is used by all the user
     * @param  string $id_p is the name of the user
     * @param  string $nome_gara is the name of the race
     * @param  string $gp1 is the driver placed in first place in Race Day
     * @param  string $gp2 is the driver placed in second place in Race Day
     * @param  string $gp3 is the driver place in third place in Race Day
     * @param  string $giroVeloce is the driver placed for the quick lap in Race Day
     * @param  string $vsc is the value if the virtual safety car is entered or no
     * @param  string $sc is the value if the safety car is entered or no
     * @param  int $nRitirati is the number of retired pilots
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertPronoRace(string $id_p, string $nome_gara, string $gp1, string $gp2, string $gp3, string $giroVeloce, string $vsc, string $sc, int $nRitirati): string
    {
        try {
            $sql = "SELECT * from pronostici where id_p=:id_p and nome_gara=:nome_gara";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
            $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                //se é gia presente il pronostico delle qualifiche, ma non della gara
                if (empty($result[0]['gp1'])) {
                    $sql = "UPDATE pronostici set gp1=:gp1,gp2=:gp2,gp3=:gp3, giro_veloce=:giro_veloce, n_ritirati=:n_ritirati, vsc=:VSC, sc=:SC where id_p=:id_p and nome_gara=:nome_gara";
                    $sth = $this->pdo->prepare($sql);
                    $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                    $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                    $sth->bindValue(':gp1', $gp1, PDO::PARAM_STR);
                    $sth->bindValue(':gp2', $gp2, PDO::PARAM_STR);
                    $sth->bindValue(':gp3', $gp3, PDO::PARAM_STR);
                    $sth->bindValue(':giro_veloce', $giroVeloce, PDO::PARAM_STR);
                    $sth->bindValue(':n_ritirati', $nRitirati, PDO::PARAM_INT);
                    $sth->bindValue(':VSC', $vsc, PDO::PARAM_STR);
                    $sth->bindValue(':SC', $sc, PDO::PARAM_STR);
                    $sth->execute();
                    $text = "I dati sono stati inseriti correttamente";
                } else {
                    $text = "Hai giá inserito i pronostici della gara";
                }
            } else {
                $sql = "INSERT INTO pronostici (id_p,nome_gara,gp1,gp2,gp3,giro_veloce,n_ritirati,vsc,sc) values (:id_p,:nome_gara,:gp1,:gp2, :gp3, :giro_veloce, :n_ritirati, :VSC,:SC)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':id_p', $id_p, PDO::PARAM_STR);
                $sth->bindValue(':nome_gara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':gp1', $gp1, PDO::PARAM_STR);
                $sth->bindValue(':gp2', $gp2, PDO::PARAM_STR);
                $sth->bindValue(':gp3', $gp3, PDO::PARAM_STR);
                $sth->bindValue(':giro_veloce', $giroVeloce, PDO::PARAM_STR);
                $sth->bindValue(':n_ritirati', $nRitirati, PDO::PARAM_INT);
                $sth->bindValue(':VSC', $vsc, PDO::PARAM_STR);
                $sth->bindValue(':SC', $sc, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * insertRitirati
     * This method insert the retired driver of the race
     * This method is used only by ADMIN USER
     * @param  string $nome_gara is the name of the race
     * @param  string $nome_pilota is the name of the driver retired
     * @param  string $tipo is the session in which the driver retired
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertRitirati(string $nome_gara, string $nome_pilota, string $tipo): string
    {
        try {
            $sql = "SELECT * from ritirati where nome_gara=:nomeGara and nome_pilota=:nome_pilota and tipo=:tipo";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
            $sth->bindValue(':nome_pilota', $nome_pilota, PDO::PARAM_STR);
            $sth->bindValue(':tipo', $tipo, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO ritirati (nome_gara,nome_pilota,tipo) values (:nomeGara,:nome_pilota,:tipo)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':nome_pilota', $nome_pilota, PDO::PARAM_STR);
                $sth->bindValue(':tipo', $tipo, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai giá inserito questo ritirato";
            }
        } catch (PDOException $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * insertResultQualy
     * This method insert the drivers result in the qualifying day
     * This method is used by ADMIN USER
     * @param  string $nome_gara is the name of the race
     * @param  string $qp1 is the driver who arrived first on the day of qualifying
     * @param  string $qp2 is the driver who arrived second on the day of qualifying
     * @param  string $qp3 is the driver who arrived third on the day of qualifying
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertResultQualy(string $nome_gara, string $qp1, string $qp2, string $qp3): string
    {
        try {
            $sql = "SELECT * from risultati where nome_gara=:nomeGara";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO risultati (nome_gara,qp1,qp2,qp3) values (:nomeGara,:qp1,:qp2,:qp3)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':qp1', $qp1, PDO::PARAM_STR);
                $sth->bindValue(':qp2', $qp2, PDO::PARAM_STR);
                $sth->bindValue(':qp3', $qp3, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai gia aggiunto il risultato delle qualifiche";
            }
        } catch (PDOException $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }
    
    /**
     * insertResultRace
     * This method insert the drivers result in the race day
     * This method is used by ADMIN USER
     * @param  string $nome_gara is the name of the race
     * @param  string $gp1 is the driver who arrived first in the race
     * @param  string $gp2 is the driver who arrived second in the race
     * @param  string $gp3 is the driver who arrived third in the race
     * @param  string $giroVeloce is the driver who set the fastest lap in the race
     * @param  string $vsc is result of the virtual safety car in the race
     * @param  string $sc is result of the safety car in the race
     * @param  int $nRitirati is the number result of the retired drivers
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertResultRace(string $nome_gara, string $gp1, string $gp2, string $gp3, string $giroVeloce, string $vsc, string $sc, int $nRitirati): string
    {
        try {
            $sql = "SELECT * from risultati where nome_gara=:nomeGara";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($result)) {
                $sql = "UPDATE risultati set gp1=:gp1, gp2=:gp2, gp3=:gp3, giro_veloce=:giro_veloce, n_ritirati=:n_ritirati, vsc=:VSC, sc=:SC where nome_gara=:nomeGara";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':gp1', $gp1, PDO::PARAM_STR);
                $sth->bindValue(':gp2', $gp2, PDO::PARAM_STR);
                $sth->bindValue(':gp3', $gp3, PDO::PARAM_STR);
                $sth->bindValue(':giro_veloce', $giroVeloce, PDO::PARAM_STR);
                $sth->bindValue(':n_ritirati', $nRitirati, PDO::PARAM_INT);
                $sth->bindValue(':VSC', $vsc, PDO::PARAM_STR);
                $sth->bindValue(':SC', $sc, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Non hai inserito i pronostici delle qualifiche";
            }
        } catch (PDOException $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }
        
    /**
     * insertPagelle
     * This method is used to insert the driver rating of three site
     * @param  string $nome_gara is the name of the race
     * @param  string $nomePilota is the name of the driver
     * @param  float $valSito1 is the rating of the driver in the first site
     * @param  float $valSito2 is the rating of the driver in the second site
     * @param  float $valSito3 is the rating of the driver in the third site
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function insertPagelle(string $nome_gara, string $nomePilota, float $valSito1, float $valSito2, float $valSito3): string
    {
        try {
            $sql = "SELECT * from pagelle where nome_gara=:nomeGara and pilota=:nomePilota";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
            $sth->bindValue(':nomePilota', $nomePilota, PDO::PARAM_STR);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO pagelle (nome_gara,pilota,sito1,sito2,sito3) values (:nomeGara,:nomePilota,:sito1,:sito2,:sito3)";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':nomeGara', $nome_gara, PDO::PARAM_STR);
                $sth->bindValue(':nomePilota', $nomePilota, PDO::PARAM_STR);
                $sth->bindValue(':sito1', $valSito1, PDO::PARAM_STR);
                $sth->bindValue(':sito2', $valSito2, PDO::PARAM_STR);
                $sth->bindValue(':sito3', $valSito3, PDO::PARAM_STR);
                $sth->execute();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai gia inserito la pagella di questo pilota";
            }
        } catch (PDOException $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }
}
