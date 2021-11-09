<?php


namespace App\Models\Class;

/**
 * Driver
 * The Driver class check if the driver stored in the $this->driver is valid or in correct form
 */
class Driver
{
    public string $driver;
        
    /**
     * __construct
     *
     * @param  string $driver the name of the driver
     * @return void
     */
    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }    
    /**
     * isValidDriver
     * This method check if the driver is valid or not contain any special caracter
     * @return bool
     */
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
    
    /**
     * toValidFormat
     * This method transform the driver name in the correct form
     * Example: hamilton => Hamilton  
     * @return void
     */
    public function toValidFormat(): void
    {
        $toLowerCase = strtolower($this->driver);
        $this->driver = ucfirst($toLowerCase);
    }
    
    /**
     * checkDriver
     * This method apply all the method of this class in this single method
     * @return array $checkDriver['error'] that contain a string of any possible error,
     * $checkDriver['boolValue'] that contain a boolean value if all is done
     */
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
