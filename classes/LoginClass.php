<?php

require("./classes/QueryClass.php");


/**
 * LoginAuth
 * 
 * This is the main class for the Login form, in this class there are more method to check if the 
 * username or password is in the correct form. There is also a method that can execute all the method in one method (loginCheckFormat()),
 * this method return an associative array that contain an boolean value and an possible error
 * for example: if one of the username or password have an incorrect form, the assosiative array had 
 * $arrayCheck['boolValue] = false
 * $arrayCheck['error'] = the string of the error checked in this function 
 *
 */
class LoginAuth extends QExec
{

    private string $username;
    private string $password;
    
    /**
     * __construct
     *
     * @param  string $user is the username of the user
     * @param  string $psw is the password in clear of the user
     * @return void
     */
    public function __construct(string $user, string $psw)
    {
        $this->username = $user;
        $this->password = $psw;
    }

        
    /**
     * isEmpty
     * This function check if the username or password is empty
     * @return bool
     */
    public function isEmpty(): bool
    {
        if (empty($this->username) || empty($this->password)) return false;
        else return true;
    }
    
    /**
     * isValidUser
     * This function check if the usernamee contain only number or char
     * @return bool 
     */
    public function isValidUser(): bool
    {
        if (preg_match("/^[a-z0-9]*$/i", $this->username) === 1) {
            return true;
        } else return false;
    }
    
    /**
     * isValidPsw
     * This function check if the password contain only number or char
     * @return bool
     */
    public function isValidPsw(): bool
    {
        if (preg_match("/^[a-z0-9]/i", $this->password) === 1) {
            return true;
        } else return false;
    }

    
    /**
     * loginCheckFormat
     * This function check all the previous method
     * @return array $arrayCheck is an associative array that contain the bool value of the check of all method, and possible error if the check if false
     */
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
