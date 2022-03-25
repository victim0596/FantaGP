<?php

namespace App\Classes;

use App\Components\Commands\AddPronosticiGara\AddPronosticiGaraCommand;
use App\Components\Commands\AddPronosticiGara\AddPronosticiGaraCommandHandler;
use App\Components\Commands\AddPronosticiQualifica\AddPronosticiQualificaCommand;
use App\Components\Commands\AddPronosticiQualifica\AddPronosticiQualificaCommandHandler;
use App\Components\Queries\GetPagelleByRaceByDriver\GetPagelleByRaceByDriverQuery;
use App\Components\Queries\GetPagelleByRaceByDriver\GetPagelleByRaceByDriverQueryHandler;
use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQuery;
use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQueryHandler;
use App\Components\Queries\GetRaceResultByRace\GetRaceResultByRaceQuery;
use App\Components\Queries\GetRaceResultByRace\GetRaceResultByRaceQueryHandler;
use App\Components\Queries\GetRitiratiByRaceByDriverByType\GetRitiratiByRaceByDriverByTypeQuery;
use App\Components\Queries\GetRitiratiByRaceByDriverByType\GetRitiratiByRaceByDriverByTypeQueryHandler;
use Exception;

class CalcoloPunteggi
{
    public float $ptQualifiche;
    public float $ptGare;
    public float $ptPagelle;

    public function __construct()
    {
        $this->ptQualifiche = 0;
        $this->ptGare = 0;
        $this->ptPagelle = 0;
        $this->pt = config('valPunteggi');
    }

    function calcoloPtPronostici(string $nome_gara, string $nome_utente): int
    {
        $punti = 0;
        $query = new GetPronosticiByRaceByUserQuery($nome_gara, $nome_utente);
        $result = GetPronosticiByRaceByUserQueryHandler::Retrieve($query);
        //se non ha messo nessun pronostico, vado ad aggiungere una row sia in pronostici gara che pronostici qualifica
        if(empty($result->getUtente())) {
            //row per pronostici qualifica
            $queryQualifica = new AddPronosticiQualificaCommand($nome_utente, $nome_gara);
            $resultQualifica = AddPronosticiQualificaCommandHandler::Execute($queryQualifica);
            if (!$resultQualifica->getSuccess()) throw new Exception($resultQualifica->getMessage());
            //row per pronostici gara
            $queryGara = new AddPronosticiGaraCommand($nome_utente, $nome_gara);
            $resultGara = AddPronosticiGaraCommandHandler::Execute($queryGara);
            if (!$resultGara->getSuccess()) throw new Exception($resultGara->getMessage());
            return 0;
        }
        //memorizzo tutti i pronostici di utente[i] in delle variabili
        $qualifica1 = $result->getQP1();
        $qualifica2 = $result->getQP2();
        $qualifica3 = $result->getQP3();
        $gara1 = $result->getGP1();
        $gara2 = $result->getGP2();
        $gara3 = $result->getGP3();
        $giroveloce = $result->getGiroVeloce();
        $nrit = $result->getNRitirati();
        $sc = $result->getSC();
        $vsc = $result->getVSC();
        //query per risultati
        $queryResult = new GetRaceResultByRaceQuery($nome_gara);
        $dataResult =  GetRaceResultByRaceQueryHandler::Retrieve($queryResult);
        //memorizzo i risultati della gara in delle variabili
        $qualifica1_risultati = $dataResult->getQp1();
        $qualifica2_risultati = $dataResult->getQp2();
        $qualifica3_risultati = $dataResult->getQp3();
        $gara1_risultati = $dataResult->getGp1();
        $gara2_risultati = $dataResult->getGp2();
        $gara3_risultati = $dataResult->getGp3();
        $giroveloce_risultati = $dataResult->getGiroVeloce();
        $nrit_risultati = $dataResult->getNRitirati();
        $sc_risultati = $dataResult->getSC();
        $vsc_risultati = $dataResult->getVSC();
        //calcolo punti qualifiche
        if ($qualifica1 == $qualifica1_risultati && !empty($qualifica1)) {
            $punti = $punti + $this->pt['qp1PT'];
        }

        if ($qualifica2 == $qualifica2_risultati && !empty($qualifica2)) {
            $punti = $punti + $this->pt['qp2PT'];
        }

        if ($qualifica3 == $qualifica3_risultati && !empty($qualifica3)) {
            $punti = $punti + $this->pt['qp3PT'];
        }

        if ($qualifica1 == $qualifica1_risultati && $qualifica2 == $qualifica2_risultati && $qualifica3 == $qualifica3_risultati && !empty($qualifica1) && !empty($qualifica2) && !empty($qualifica3)) {
            $punti = $punti + $this->pt['ALLqualyPT'];
        }
        //memorizzo i punti che ho sommato fin ad adesso come punti qualifiche
        $this->ptQualifiche = $punti;

        //calcolo punti gara
        if ($gara1 == $gara1_risultati && !empty($gara1)) {
            $punti = $punti + $this->pt['gp1PT'];
        }

        if ($gara2 == $gara2_risultati && !empty($gara2)) {
            $punti = $punti + $this->pt['gp2PT'];
        }

        if ($gara3 == $gara3_risultati && !empty($gara3)) {
            $punti = $punti + $this->pt['gp3PT'];
        }

        if ($gara1 == $gara1_risultati && $gara2 == $gara2_risultati && $gara3 == $gara3_risultati && !empty($gara1) && !empty($gara2) && !empty($gara3)) {
            $punti = $punti + $this->pt['ALLracePT'];
        }

        //calcolo punti giro veloce
        if ($giroveloce == $giroveloce_risultati && !empty($giroveloce)) {
            $punti = $punti + $this->pt['fastLapPT'];
        }

        //calcolo punti n_rit
        if ($nrit == $nrit_risultati && isset($nrit) && ($nrit === '0' || !empty($nrit))) {
            $punti = $punti + $this->pt['retiredPT'];
        }

        //calcolo punti vsc e sc
        if (!empty($sc) && !empty($vsc)) {
            if ($sc == $sc_risultati) {
                $punti = $punti + $this->pt['scPT'];
            } else {
                $punti = $punti + $this->pt['scMalusPT'];
            }

            if ($vsc == $vsc_risultati) {
                $punti = $punti + $this->pt['vscPT'];
            } else {
                $punti = $punti + $this->pt['vscMalusPT'];
            }
        }
        //memorizzo i punti della gara
        $this->ptGare = $punti - $this->ptQualifiche;
        return $punti;
    }

    function calcoloPtPagelle(string $nome_gara, string $nome_utente): float
    {
        $punti = 0.0;
        //switch che a seconda dell'utente prende i suoi piloti e scuderia, da modificare appena si fa l'asta
        switch ($nome_utente) {
            case 'Oliver':
                $pilota1 = "Gasly";
                $pilota2 = "Giovinazzi";
                $scuderia = "RedBull";
                break;
            case 'Ciccio':
                $pilota1 = "Raikkonen";
                $pilota2 = "Alonso";
                $scuderia = "Mercedes";
                break;
            case 'SpiritoBlu':
                $pilota1 = "Sainz";
                $pilota2 = "Vettel";
                $scuderia = "Ferrari";
                break;
            case 'Dario':
                $pilota1 = "Tsunoda";
                $pilota2 = "Ocon";
                $scuderia = "Mclaren";
                break;
            case 'gianpaolo':
                $pilota1 = "Leclerc";
                $pilota2 = "Bottas";
                $scuderia = "Alpine";
                break;
            case 'Andrea':
                $pilota1 = "Russell";
                $pilota2 = "Schumacher";
                $scuderia = "Aston-Martin";
                break;
            case 'Ermenegildo':
                $pilota1 = "Ricciardo";
                $pilota2 = "Latifi";
                $scuderia = "Alpha Tauri";
                break;
            case 'Toto':
                $pilota1 = "Verstappen";
                $pilota2 = "Stroll";
                $scuderia = "Haas";
                break;
            case 'alessiodom97':
                $pilota1 = "Norris";
                $pilota2 = "Perez";
                $scuderia = "Alfa Racing";
                break;
            case 'pinguinoSquadracorse':

                $pilota1 = "Hamilton";
                $pilota2 = "Mazepin";
                $scuderia = "Williams";
                break;
        }

        //switch che a seconda del valore della scuderia andrá a scegliere i piloti corretti di quella scuderia
        switch ($scuderia) {
            case 'Mercedes':
                $driver1 = "Hamilton";
                $driver2 = "Russell";
                break;
            case 'Ferrari':
                $driver1 = "Leclerc";
                $driver2 = "Sainz";
                break;
            case 'RedBull':
                $driver1 = "Verstappen";
                $driver2 = "Perez";
                break;
            case 'Aston-Martin':
                $driver1 = "Vettel";
                $driver2 = "Stroll";
                break;
            case 'Mclaren':
                $driver1 = "Norris";
                $driver2 = "Ricciardo";
                break;
            case 'Alpine':
                $driver1 = "Alonso";
                $driver2 = "Ocon";
                break;
            case 'Williams':
                $driver1 = "Albon";
                $driver2 = "Latifi";
                break;
            case 'Haas':
                $driver1 = "Magnussen";
                $driver2 = "Schumacher";
                break;
            case 'Alpha Tauri':
                $driver1 = "Gasly";
                $driver2 = "Tsunoda";
                break;
            case 'Alfa Racing':
                $driver1 = "Bottas";
                $driver2 = "Zhou";
                break;
        }

        //query per il primo pilota e calcolo media con numero plastico
        $queryPilota1 = new GetPagelleByRaceByDriverQuery($nome_gara, $pilota1);
        $dataPilota1 = GetPagelleByRaceByDriverQueryHandler::Retrieve($queryPilota1);
        if(empty($dataPilota1->getPilota())) return 0.0;
        $sito1_pilota1 = $dataPilota1->getSito1();
        $sito2_pilota1 = $dataPilota1->getSito2();
        $sito3_pilota1 = $dataPilota1->getSito3();
        $media_pilota1 = ($sito1_pilota1 + $sito2_pilota1 + $sito3_pilota1) * 1.3247;
        //query per il secondo pilota e calcolo media con numero plastico
        $queryPilota2 = new GetPagelleByRaceByDriverQuery($nome_gara, $pilota2);
        $dataPilota2 = GetPagelleByRaceByDriverQueryHandler::Retrieve($queryPilota2);
        $sito1_pilota2 = $dataPilota2->getSito1();
        $sito2_pilota2 = $dataPilota2->getSito2();
        $sito3_pilota2 = $dataPilota2->getSito3();
        $media_pilota2 = ($sito1_pilota2 + $sito2_pilota2 + $sito3_pilota2) * 1.3247;
        //query per la scuderia e calcolo media con numero plastico
        //query pilota 1 scuderia
        $queryPilotaScuderia1 = new GetPagelleByRaceByDriverQuery($nome_gara, $driver1);
        $dataPilotaScuderia1 = GetPagelleByRaceByDriverQueryHandler::Retrieve($queryPilotaScuderia1);
        $sito1_driver1_scuderia = $dataPilotaScuderia1->getSito1();
        $sito2_driver1_scuderia = $dataPilotaScuderia1->getSito2();
        $sito3_driver1_scuderia = $dataPilotaScuderia1->getSito3();
        //query pilota 2 scuderia
        $queryPilotaScuderia2 = new GetPagelleByRaceByDriverQuery($nome_gara, $driver2);
        $dataPilotaScuderia2 = GetPagelleByRaceByDriverQueryHandler::Retrieve($queryPilotaScuderia2);
        $sito1_driver2_scuderia = $dataPilotaScuderia2->getSito1();
        $sito2_driver2_scuderia = $dataPilotaScuderia2->getSito2();
        $sito3_driver2_scuderia = $dataPilotaScuderia2->getSito3();
        //media
        $media_sito1 = ($sito1_driver1_scuderia + $sito1_driver2_scuderia) / 2;
        $media_sito2 = ($sito2_driver1_scuderia + $sito2_driver2_scuderia) / 2;
        $media_sito3 = ($sito3_driver1_scuderia + $sito3_driver2_scuderia) / 2;
        $media_scuderia = ($media_sito1 + $media_sito2 + $media_sito3) * 1.3247;
        //query per il controllo dei ritirati
        //query pilota 1 ritirato qualifica
        $queryRitiratoPilota1 = new GetRitiratiByRaceByDriverByTypeQuery($nome_gara, $driver1, 0);
        $retiredPilot1 = GetRitiratiByRaceByDriverByTypeQueryHandler::Retrieve($queryRitiratoPilota1);
        if (!empty($retiredPilot1->getPilota())) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverQ'];
        }
        //query pilota 2 ritirato qualifica
        $queryRitiratoPilota2 = new GetRitiratiByRaceByDriverByTypeQuery($nome_gara, $driver2, 0);
        $retiredPilot2 = GetRitiratiByRaceByDriverByTypeQueryHandler::Retrieve($queryRitiratoPilota2);
        if (!empty($retiredPilot2->getPilota())) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverQ'];
        }
        //query pilota 1 ritirato gara
        $queryRitiratoPilota1Gara = new GetRitiratiByRaceByDriverByTypeQuery($nome_gara, $driver1, 1);
        $retiredPilot1 = GetRitiratiByRaceByDriverByTypeQueryHandler::Retrieve($queryRitiratoPilota1Gara);
        if (!empty($retiredPilot1->getPilota())) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverR'];
        }
        //query pilota 2 ritirato gara
        $queryRitiratoPilota2Gara = new GetRitiratiByRaceByDriverByTypeQuery($nome_gara, $driver2, 1);
        $retiredPilot2 = GetRitiratiByRaceByDriverByTypeQueryHandler::Retrieve($queryRitiratoPilota2Gara);
        if (!empty($retiredPilot2->getPilota())) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverR'];
        }
        //calcolo punti
        $punti = $media_pilota1 + $media_pilota2 + $media_scuderia;
        $this->ptPagelle = $punti;
        return $punti;
    }
}
