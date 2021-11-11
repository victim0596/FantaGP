<?php
namespace App\Classes;


/**
 * Race
 * This is the class for all the race in calendar, with his method isValidRace can I check if the race is in correct form
 * 
 */
class Race {
    public string $nomeGara;
    
    /**
     * __construct
     *
     * @param  string $nomeGara the name of the race
     * @return void
     */
    public function __construct(string $nomeGara)
    {
        $this->nomeGara = $nomeGara;
    }
    
    /**
     * isValidRace
     * This method check if the $this->nomeGara is valid, return true if is a valid race name, false otherwise
     * @return bool
     */
    public function isValidRace(): bool
    {
        $arrayRace = [
            "Bahrein", "Italia-Imola", "Portogallo", "Spagna", "Monaco", "Azerbaigian", "Francia", "Austria", "Austria-2", "Gran Bretagna", "Ungheria",
            "Belgio", "Olanda", "Italia-Monza", "Russia", "Turchia", "USA", "Messico", "Brasile", "Qatar", "Arabia Saudita", "Emirati Arabi"];
        if (preg_match("/^[a-z]*$/i", $this->nomeGara) != 1) {
            return false;
        } else {
            if(in_array($this->nomeGara, $arrayRace)) return true;
            else return false;
        }
    }
}