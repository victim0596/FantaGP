<?php

require('./classes/DriverClass.php');


class FormCheck extends Driver
{

    public function __construct(string $nomeGara)
    {
        $race = new Race($nomeGara);
        if (!$race->isValidRace()) throw new Exception('Nome della gara non valido');
    }

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
        } catch (Exception $ex) {
            $checkQualy['boolValue'] = false;
            $checkQualy['error'] = "Errore Sconosciuto [FORM QUALY]";
        } finally {
            return $checkQualy;
        }
    }


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
        } catch (Exception $ex) {
            $checkRace['boolValue'] = false;
            $checkRace['error'] = "Errore Sconosciuto [FORM RACE]";
        } finally {
            return $checkRace;
        }
    }
    
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
