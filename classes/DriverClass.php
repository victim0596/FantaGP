<?php

require('./classes/RaceClass.php');


class Driver extends Race
{
    public string $driver;
    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }
    public function isValidDriver(): bool
    {
        $arrayDriver = [
            "Hamilton", "Bottas", "Verstappen", "Perez", "Sainz", "Leclerc", "Ricciardo", "Norris", "Alonso", "Ocon",
            "Giovinazzi", "Raikkonen", "Gasly", "Tsunoda", "Russel", "Latifi", "Mazepin", "Schumacher", "Vettel", "Stroll"
        ];
        if (preg_match("/^[a-z]*$/i", $this->driver) != 1) {
            return false;
        } else {
            if (in_array($this->driver, $arrayDriver)) return true;
            else return false;
        }
    }

    public function toValidFormat(): void
    {
        $toLowerCase = strtolower($this->driver);
        $this->driver = ucfirst($toLowerCase);
    }

    public function checkDriver(): array
    {
        $checkDriver['boolValue'] = true;
        $checkDriver['error'] = null;
        if (!$this->isValidDriver()) {
            $checkDriver['boolValue'] = false;
            $checkDriver['error'] = "Nome del pilota non valido";
        } else {
            $this->toValidFormat();
        }
        return $checkDriver;
    }
}
