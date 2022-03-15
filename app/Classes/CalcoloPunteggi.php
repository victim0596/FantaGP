<?php

namespace App\Classes;

use Exception;

class CalcoloPunteggi
{
    public function __construct()
    {
        $this->pt = config('valPunteggi');
    }

    function calcoloPtPronostici(string $nome_gara, string $nome_utente): int
    {
        $punti = 0;
        $qExec = new QExec();
        $data = $qExec->loadPronoByRaceByUser($nome_utente, $nome_gara);
        if(empty($data['data'])) return 0;
        if ($data['error'] != null) throw new Exception('Errore in loadPronoByRaceByUser [METHOD QExec]');
        //memorizzo tutti i pronostici di utente[i] in delle variabili
        $qualifica1 = $data['data']['qp1'];
        $qualifica2 = $data['data']['qp2'];
        $qualifica3 = $data['data']['qp3'];
        $gara1 = $data['data']['gp1'];
        $gara2 = $data['data']['gp2'];
        $gara3 = $data['data']['gp3'];
        $giroveloce = $data['data']['giro_veloce'];
        $nrit = $data['data']['n_ritirati'];
        $sc = $data['data']['SC'];
        $vsc = $data['data']['VSC'];
        //query per risultati
        $dataResult = $qExec->loadRaceResult($nome_gara);
        if ($data['error'] != null) throw new Exception('Errore in loadRaceResult [METHOD QExec]');
        //memorizzo i risultati della gara in delle variabili
        $qualifica1_risultati = $dataResult['data']['qp1'];
        $qualifica2_risultati = $dataResult['data']['qp2'];
        $qualifica3_risultati = $dataResult['data']['qp3'];
        $gara1_risultati = $dataResult['data']['gp1'];
        $gara2_risultati = $dataResult['data']['gp2'];
        $gara3_risultati = $dataResult['data']['gp3'];
        $giroveloce_risultati = $dataResult['data']['giro_veloce'];
        $nrit_risultati = $dataResult['data']['n_ritirati'];
        $sc_risultati = $dataResult['data']['SC'];
        $vsc_risultati = $dataResult['data']['VSC'];
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

        $qExec = new QExec();
        //query per il primo pilota e calcolo media con numero plastico
        $dataPilota1 = $qExec->loadPagelleByRaceByDriver($nome_gara, $pilota1);
        if ($dataPilota1['error'] != null) throw new Exception($dataPilota1['error']);
        if(empty($dataPilota1['data'])) return 0.0;
        $sito1_pilota1 = $dataPilota1['data']['sito1'];
        $sito2_pilota1 = $dataPilota1['data']['sito2'];
        $sito3_pilota1 = $dataPilota1['data']['sito3'];
        $media_pilota1 = ($sito1_pilota1 + $sito2_pilota1 + $sito3_pilota1) * 1.3247;
        //query per il secondo pilota e calcolo media con numero plastico
        $dataPilota2 = $qExec->loadPagelleByRaceByDriver($nome_gara, $pilota2);
        if ($dataPilota2['error'] != null) throw new Exception($dataPilota2['error']);
        $sito1_pilota2 = $dataPilota2['data']['sito1'];
        $sito2_pilota2 = $dataPilota2['data']['sito2'];
        $sito3_pilota2 = $dataPilota2['data']['sito3'];
        $media_pilota2 = ($sito1_pilota2 + $sito2_pilota2 + $sito3_pilota2) * 1.3247;
        //query per la scuderia e calcolo media con numero plastico
        //query pilota 1 scuderia
        $dataPilotaScuderia1 = $qExec->loadPagelleByRaceByDriver($nome_gara, $driver1);
        if ($dataPilotaScuderia1['error'] != null) throw new Exception($dataPilotaScuderia1['error']);
        $sito1_driver1_scuderia = $dataPilotaScuderia1['data']['sito1'];
        $sito2_driver1_scuderia = $dataPilotaScuderia1['data']['sito2'];
        $sito3_driver1_scuderia = $dataPilotaScuderia1['data']['sito3'];
        //query pilota 2 scuderia
        $dataPilotaScuderia2 = $qExec->loadPagelleByRaceByDriver($nome_gara, $driver2);
        if ($dataPilotaScuderia2['error'] != null) throw new Exception($dataPilotaScuderia2['error']);
        $sito1_driver2_scuderia = $dataPilotaScuderia2['data']['sito1'];
        $sito2_driver2_scuderia = $dataPilotaScuderia2['data']['sito2'];
        $sito3_driver2_scuderia = $dataPilotaScuderia2['data']['sito3'];
        //media
        $media_sito1 = ($sito1_driver1_scuderia + $sito1_driver2_scuderia) / 2;
        $media_sito2 = ($sito2_driver1_scuderia + $sito2_driver2_scuderia) / 2;
        $media_sito3 = ($sito3_driver1_scuderia + $sito3_driver2_scuderia) / 2;
        $media_scuderia = ($media_sito1 + $media_sito2 + $media_sito3) * 1.3247;
        //query per il controllo dei ritirati
        //query pilota 1 ritirato qualifica
        $retiredPilot1 = $qExec->loadRitiratiByRaceByDriverByType($nome_gara, $driver1, 'Qualifica');
        if ($retiredPilot1['error'] != null) throw new Exception($retiredPilot1['error']);
        if (!empty($retiredPilot1['data'])) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverQ'];
        }
        //query pilota 2 ritirato qualifica
        $retiredPilot2 = $qExec->loadRitiratiByRaceByDriverByType($nome_gara, $driver2, 'Qualifica');
        if ($retiredPilot2['error'] != null) throw new Exception($retiredPilot2['error']);
        if (!empty($retiredPilot2['data'])) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverQ'];
        }
        //query pilota 1 ritirato gara
        $retiredPilot1 = $qExec->loadRitiratiByRaceByDriverByType($nome_gara, $driver1, 'Gara');
        if ($retiredPilot1['error'] != null) throw new Exception($retiredPilot1['error']);
        if (!empty($retiredPilot1['data'])) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverR'];
        }
        //query pilota 2 ritirato gara
        $retiredPilot2 = $qExec->loadRitiratiByRaceByDriverByType($nome_gara, $driver2, 'Gara');
        if ($retiredPilot2['error'] != null) throw new Exception($retiredPilot2['error']);
        if (!empty($retiredPilot2['data'])) {
            $media_scuderia = $media_scuderia + $this->pt['retiredDriverR'];
        }
        //calcolo punti
        $punti = $media_pilota1 + $media_pilota2 + $media_scuderia;

        return $punti;
    }
}
