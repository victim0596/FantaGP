<?php

require('./classes/DriverClass.php');


/**
 * FormCheck
 * This class check all the form of the website, and find any errors or attempts to break the form
 * 
 */
class FormCheck extends Driver
{
    
    /**
     * __construct
     *
     * @param  string $nomeGara is the name of the race
     * @return void
     */
    public function __construct(string $nomeGara)
    {
        $race = new Race($nomeGara);
        if (!$race->isValidRace()) throw new Exception('Nome della gara non valido');
    }
    
    /**
     * checkQualyForm
     * This method check any entries of any Qualifying Form
     * @param  string $qp1 is the driver name placed in the first place passed in any Qualifying Form
     * @param  string $qp2 is the driver name placed in the second place passed in any Qualifying Form
     * @param  string $qp3 is the driver name placed in the third place passed in any Qualifying Form
     * @return array $checkQualy['error'] that contain a string of any possible error,
     * $checkQualy['boolValue'] that contain a boolean value if all is done
     */
    public function checkQualyForm(string $qp1, string $qp2, string $qp3): array
    {
        $checkQualy['boolValue'] = true;
        $checkQualy['error'] = null;
        try {
            $qp1Driver = new Driver($qp1);
            $qp2Driver = new Driver($qp2);
            $qp3Driver = new Driver($qp3);
            if (!$qp1Driver->checkDriver()['boolValue']) {
                $checkQualy['boolValue'] = false;
                $checkQualy['error'] = "Nome del pilota in P1 non valido";
            }
            if (!$qp2Driver->checkDriver()['boolValue']) {
                $checkQualy['boolValue'] = false;
                $checkQualy['error'] = "Nome del pilota in P2 non valido";
            }
            if (!$qp3Driver->checkDriver()['boolValue']) {
                $checkQualy['boolValue'] = false;
                $checkQualy['error'] = "Nome del pilota in P3 non valido";
            }
            if($qp1 == $qp2 || $qp1 == $qp3 || $qp2 == $qp3) {
                $checkQualy['boolValue'] = false;
                $checkQualy['error'] = "Hai inserito uno stesso pilota in uno degli altri campi";
            }
        } catch (Exception $ex) {
            $checkQualy['boolValue'] = false;
            $checkQualy['error'] = "Errore Sconosciuto [FORM QUALY]";
        } finally {
            return $checkQualy;
        }
    }

    
    /**
     * checkRaceForm
     * This method check any entries of any Race Form
     * @param  string $gp1 is the driver name placed in the first place 
     * @param  string $gp2 is the driver name placed in the second place
     * @param  string $gp3 is the driver name placed in the third place
     * @param  string $giroVeloce is the driver name placed in the quickest lap
     * @param  string $vsc is the value of the virtual safety car
     * @param  string $sc is the value of the safety car
     * @param  int $nRitirati is the number of the retired driver
     * @return array $checkRace['error'] that contain a string of any possible error,
     * $checkRace['boolValue'] that contain a boolean value if all is done
     */
    public function checkRaceForm(string $gp1, string $gp2, string $gp3, string $giroVeloce, string $vsc, string $sc, int $nRitirati): array
    {
        $checkRace['boolValue'] = true;
        $checkRace['error'] = null;
        try {
            $gp1Driver = new Driver($gp1);
            $gp2Driver = new Driver($gp2);
            $gp3Driver = new Driver($gp3);
            $giroVeloceDriver = new Driver($giroVeloce);
            if (!$gp1Driver->checkDriver()['boolValue']) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Nome del pilota in P1 non valido";
            }
            if (!$gp2Driver->checkDriver()['boolValue']) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Nome del pilota in P2 non valido";
            }
            if (!$gp3Driver->checkDriver()['boolValue']) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Nome del pilota in P3 non valido";
            }
            if (!$giroVeloceDriver->checkDriver()['boolValue']) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Nome del pilota in Giro Veloce non valido";
            }
            if (preg_match("/^(si|no)$/i", $vsc) != 1) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Valore di VSC non valido";
            }
            if (preg_match("/^(si|no)$/i", $sc) != 1) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Valore di SC non valido";
            }
            if (preg_match("/^\b([0-9]|10)\b/", $nRitirati) != 1) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Numero di ritirati non valido non valido (0-10)";
            }
            if($gp1 == $gp2 || $gp1 == $gp3 || $gp2 == $gp3) {
                $checkRace['boolValue'] = false;
                $checkRace['error'] = "Hai inserito uno stesso pilota in uno degli altri campi";
            }
        } catch (Exception $ex) {
            $checkRace['boolValue'] = false;
            $checkRace['error'] = "Errore Sconosciuto [FORM RACE]";
        } finally {
            return $checkRace;
        }
    }
        
    /**
     * checkAddRitiratiForm
     * This method check any entries of the Aggiungi Ritirati Form
     * @param  string $driverInput is the name of the driver passed in the form
     * @param  string $tipo is the session name in which driver is retired
     * @return array $checkRitirati['error'] that contain a string of any possible error,
     * $checkRitirati['boolValue'] that contain a boolean value if all is done
     */
    public function checkAddRitiratiForm(string $driverInput, string $tipo): array
    {
        $checkRitirati['boolValue'] = true;
        $checkRitirati['error'] = null;
        try{
            $driver = new Driver($driverInput);
            if(!$driver->checkDriver()['boolValue']){
                $checkRitirati['boolValue'] = false;
                $checkRitirati['error'] = "Nome del pilota non valido";    
            }
            if(preg_match("/^(Qualifica|Gara)$/i", $tipo) !=1){
                $checkRitirati['boolValue'] = false;
                $checkRitirati['error'] = "Tipo non valido";
            }
        }catch(Exception $ex){
            $checkRitirati['boolValue'] = false;
            $checkRitirati['error'] = "Errore Sconosciuto [FORM RITIRATI]";
        }finally{
            return $checkRitirati;
        }
    }
    
    /**
     * checkAddPagelleForm
     * This method check any entries of the Aggiungi Pagelle form
     * @param  string $driverInput is the name of the driver passed in the form
     * @param  float $sito1 is the value of first site driver rating passed in the form
     * @param  float $sito2 is the value of second site driver rating passed in the form
     * @param  float $sito3 is the value of third site driver rating passed in the form
     * @return array $checkPagelle['error'] that contain a string of any possible error,
     * $checkPagelle['boolValue'] that contain a boolean value if all is done
     */
    public function checkAddPagelleForm(string $driverInput, float $sito1, float $sito2, float $sito3): array
    {
        $checkPagelle['boolValue'] = true;
        $checkPagelle['error'] = null;
        try{
            $driver = new Driver($driverInput);
            if(!$driver->checkDriver()['boolValue']){
                $checkPagelle['boolValue'] = false;
                $checkPagelle['error'] = "Nome del pilota non valido";
            }
            if (preg_match("/^[0-9](\.(0|5)+)?$/", $sito1) != 1) {
                $checkPagelle['boolValue'] = false;
                $checkPagelle['error'] = "Voto non valido (0-10)";
            }
            if (preg_match("/^[0-9](\.(0|5)+)?$/", $sito2) != 1) {
                $checkPagelle['boolValue'] = false;
                $checkPagelle['error'] = "Voto non valido (0-10)";
            }
            if (preg_match("/^[0-9](\.(0|5)+)?$/", $sito3) != 1) {
                $checkPagelle['boolValue'] = false;
                $checkPagelle['error'] = "Voto non valido (0-10)";
            }
        }catch(Exception $ex){
            $checkPagelle['boolValue'] = false;
            $checkPagelle['error'] = "Errore Sconosciuto [FORM PAGELLE]";
        }finally{
            return $checkPagelle;
        }
    }


    //Da aggiungere dopo
    /*
    
    public function checkEseguiQueryProfilo():bool{

    }
*/
}
