<?php



class Race {
    public string $nomeGara;

    public function __construct(string $nomeGara)
    {
        $this->nomeGara = $nomeGara;
    }

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