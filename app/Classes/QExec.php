<?php

namespace App\Classes;


use App\Models\LoginModel;
use App\Models\PagelleModel;
use App\Models\PronosticiModel;
use App\Models\RisultatiModel;
use App\Models\RitiratiModel;
use Illuminate\Support\Facades\DB;
use Exception;

/**
 * QExec
 * This is the main class for execute all the query of the website, extends the DBConn class
 */
class QExec
{

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
            $result = LoginModel::where('username', $usernameInput)->first();
            if (!empty($result)) {
                $password = $result->password;
                $salt = "0x618f0554f66153b508be1813c76c26bb";
                $psw_salted = hash_hmac("sha256", $passwordInput, $salt);
                if (password_verify($psw_salted, $password)) {
                    return true;
                }
            }
            return false;
        } catch (Exception $ex) {
            printf("%s \n", $ex->getMessage());
            return false;
        }
    }

    /**
     * loadRaceResult
     * This method return the result of the race
     * @param  string $nome_gara is the name of the race
     * @return array
     */
    public function loadRaceResult(string $nome_gara): array
    {
        $loadResult['error'] = null;
        $loadResult['data'] = [];
        try {
            $data = RisultatiModel::where('nome_gara', $nome_gara)->first();
            $loadResult['data'] = $data;
        } catch (Exception $e) {
            $loadResult['error'] = $e->getMessage();
        } finally {
            return $loadResult;
        }
    }

    /**
     * loadPagelleByRaceByDriver
     * This method return rating of the driver by race
     * @param  mixed $nome_gara the name of the race
     * @param  mixed $nome_pilota the name of the driver
     * @return array
     */
    public function loadPagelleByRaceByDriver(string $nome_gara, string $nome_pilota): array
    {
        $loadPagelle['error'] = null;
        $loadPagelle['data'] = [];
        try {
            $data = PagelleModel::where('nome_gara', $nome_gara)->where('pilota', $nome_pilota)->first();
            $loadPagelle['data'] = $data;
        } catch (Exception $e) {
            $loadPagelle['error'] = $e->getMessage();
        } finally {
            return $loadPagelle;
        }
    }

    /**
     * loadRitiratiByRaceByDriverByType
     * This method return retired driver by race and by type
     * @param  mixed $nome_gara the name of the race
     * @param  mixed $nome_pilota the name of the driver
     * @param  mixed $tipo the type of retirement
     * @return array
     */
    public function loadRitiratiByRaceByDriverByType(string $nome_gara, string $nome_pilota, string $tipo): array
    {
        $loadRitirati['error'] = null;
        $loadRitirati['data'] = [];
        try {
            $data = RitiratiModel::where('nome_gara', $nome_gara)->where('nome_pilota', $nome_pilota)->where('tipo', $tipo)->first();
            $loadRitirati['data'] = $data;
        } catch (Exception $e) {
            $loadRitirati['error'] = $e->getMessage();
        } finally {
            return $loadRitirati;
        }
    }

    /**
     * loadPtProfile
     * This method load the pt of all rankings of the user
     * @param  string $id_p is the name of the user
     * @return array $loadPt['error'] contain any possibile error, $loadPt['data'] contain the data of all rankings
     */
    public function loadPtProfile(string $id_p): array
    {
        $loadPt['error'] = null;
        $loadPt['data'] = [];
        try {
            $data = PronosticiModel::selectRaw('id_p, SUM(punti) as puntiTot, SUM(punti_pag) as puntiPag, SUM(punti_pron) as puntiPron')->where('id_p', $id_p)->groupBy('id_p')->first();
            $loadPt['data'] = $data;
        } catch (Exception $ex) {
            $loadPt['error'] = $ex->getMessage();
        } finally {
            return $loadPt;
        }
    }

    /**
     * loadPronoByRaceByUser
     * This method load the prono by race and by user
     * @param  string $id_p the name of the user
     * @param  string $nome_gara the name of the race
     * @return array $loadCurrentProno['error'] contain any possibile error, $loadCurrentProno['data'] contain the data of the current prono of race and qualy
     */
    public function loadPronoByRaceByUser(string $id_p, string $nome_gara): array
    {
        $loadCurrentProno['error'] = null;
        $loadCurrentProno['data'] = [];
        try {
            $data = PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->first();
            $loadCurrentProno['data'] = $data;
        } catch (Exception $e) {
            $loadCurrentProno['error'] = $e->getMessage();
        } finally {
            return $loadCurrentProno;
        }
    }

    /**
     * modQualyProno
     * This method is used to modify your prono of the qualifying
     * @param  string $id_p is the name of the user
     * @param  string $nome_gara is the name of the race
     * @param  string $qp1 is the driver placed in first place in Qualy Day
     * @param  string $qp2 is the driver placed in second place in Qualy Day
     * @param  string $qp3 is the driver placed in third place in Qualy Day
     * @return string $text this string contains information if the entry was successful or 
     * if you have already entered the predictions or possible error
     */
    public function modQualyProno(string $id_p, string $nome_gara, string $qp1, string $qp2, string $qp3): string
    {
        try {
            $data = PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->first();
            //se é presente il pronostico
            if (!empty($data)) {
                //aggiorna i dati
                PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->update(['qp1' => $qp1, 'qp2' => $qp2, 'qp3' => $qp3]);
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Non hai ancora inserito nessun pronostico";
            }
        } catch (Exception $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * modRaceProno
     * This method is used to modify your prono of the race
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
    public function modRaceProno(string $id_p, string $nome_gara, string $gp1, string $gp2, string $gp3, string $giroVeloce, string $vsc, string $sc, int $nRitirati): string
    {
        try {
            $result = PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->first();
            if (!empty($result)) {
                //aggiorna i dati
                PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->update(['gp1' => $gp1, 'gp2' => $gp2, 'gp3' => $gp3, 'giro_veloce' => $giroVeloce, 'VSC' => $vsc, 'SC' => $sc, 'n_ritirati' => $nRitirati]);
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Non hai ancora inserito nessun pronostico";
            }
        } catch (Exception $e) {
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
            $result = PagelleModel::where('nome_gara', $nome_gara)->where('pilota', $nomePilota)->first();
            if (empty($result)) {
                $pagelle = new PagelleModel;
                $pagelle->nome_gara = $nome_gara;
                $pagelle->pilota = $nomePilota;
                $pagelle->sito1 = $valSito1;
                $pagelle->sito2 = $valSito2;
                $pagelle->sito3 = $valSito3;
                $pagelle->save();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai gia inserito la pagella di questo pilota";
            }
        } catch (Exception $e) {
            $text = $e->getMessage();
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
            $result = RitiratiModel::where('nome_gara', $nome_gara)->where("nome_pilota", $nome_pilota)->where("tipo", $tipo)->first();
            if (empty($result)) {
                $ritirato = new RitiratiModel;
                $ritirato->nome_gara = $nome_gara;
                $ritirato->nome_pilota = $nome_pilota;
                $ritirato->tipo = $tipo;
                $ritirato->save();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai giá inserito questo ritirato";
            }
        } catch (Exception $e) {
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
            $result = RisultatiModel::where('nome_gara', $nome_gara)->first();
            if (empty($result)) {
                $insertQualy = new RisultatiModel;
                $insertQualy->nome_gara = $nome_gara;
                $insertQualy->qp1 = $qp1;
                $insertQualy->qp2 = $qp2;
                $insertQualy->qp3 = $qp3;
                $insertQualy->save();
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Hai gia aggiunto il risultato delle qualifiche";
            }
        } catch (Exception $e) {
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
            $result = RisultatiModel::where('nome_gara', $nome_gara)->first();
            if (!empty($result)) {
                RisultatiModel::where('nome_gara', $nome_gara)->update(['gp1' => $gp1, 'gp2' => $gp2, 'gp3' => $gp3, 'giro_veloce' => $giroVeloce, 'VSC' => $vsc, 'SC' => $sc, 'n_ritirati' => $nRitirati]);
                $text = "I dati sono stati inseriti correttamente";
            } else {
                $text = "Non hai inserito i pronostici delle qualifiche";
            }
        } catch (Exception $e) {
            $text = $e->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * calcolaPunteggi
     * This method add the pt for prono and for driver rating 
     * @param  string $nome_gara is the name of the race
     * @param  string $id_p is the name of the user
     * @param  float $ptTotali is the value of the sum of ptPronostici and PtPagelle
     * @param  int $ptPronostici 
     * @param  float $ptPagelle 
     */
    public function insertPunteggi(string $nome_gara, string $id_p, float $ptTotali, int $ptPronostici, float $ptPagelle): void
    {
        try {
            //check if the user had is own row in pronostici table
            $insertPt = PronosticiModel::where('nome_gara', $nome_gara)->where('id_p', $id_p)->first();
            if (empty($insertPt)) {
                $noDataProno = new PronosticiModel;
                $noDataProno->nome_gara = $nome_gara;
                $noDataProno->id_p = $id_p;
                $noDataProno->punti = $ptTotali;
                $noDataProno->punti_pron = $ptPronostici;
                $noDataProno->punti_pag = $ptPagelle;
                $noDataProno->save();
            } else {
                PronosticiModel::where('nome_gara', $nome_gara)->where('id_p', $id_p)->update(['punti' => $ptTotali, 'punti_pron' => $ptPronostici, 'punti_pag' => $ptPagelle]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();;
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
            //$sql = "SELECT * from pronostici where id_p=:id_p and nome_gara=:nome_gara";
            $result = PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->first();
            if (!empty($result)) {
                //se é gia presente il pronostico della gara, ma non delle qualifiche
                if (empty($result['qp1'])) {
                    //$sql = "UPDATE pronostici set qp1=:qp1,qp2=:qp2,qp3=:qp3 where id_p=:id_p and nome_gara=:nome_gara";
                    PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->update(['qp1' => $qp1, 'qp2' => $qp2, 'qp3' => $qp3]);
                    $text = "I dati sono stati inseriti correttamente";
                } else {
                    $text = "Hai giá inserito i pronostici delle qualifiche";
                }
            } else {
                //$sql = "INSERT INTO pronostici (id_p,nome_gara,qp1,qp2,qp3,punti) values (:id_p,:nome_gara,:qp1,:qp2,:qp3, 0)";
                $insertQualy = new PronosticiModel;
                $insertQualy->id_p = $id_p;
                $insertQualy->nome_gara = $nome_gara;
                $insertQualy->qp1 = $qp1;
                $insertQualy->qp2 = $qp2;
                $insertQualy->qp3 = $qp3;
                $insertQualy->save();
                $text = "I dati sono stati inseriti correttamente";
            }
        } catch (Exception $e) {
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
            $result = PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->first();
            if (!empty($result)) {
                //se é gia presente il pronostico delle qualifiche, ma non della gara
                if (empty($result['gp1'])) {
                    PronosticiModel::where('id_p', $id_p)->where('nome_gara', $nome_gara)->update(['gp1' => $gp1, 'gp2' => $gp2, 'gp3' => $gp3, 'giro_veloce' => $giroVeloce, 'VSC' => $vsc, 'SC' => $sc, 'n_ritirati' => $nRitirati]);
                    $text = "I dati sono stati inseriti correttamente";
                } else {
                    $text = "Hai giá inserito i pronostici della gara";
                }
            } else {
                $inserRace = new PronosticiModel;
                $inserRace->id_p = $id_p;
                $inserRace->nome_gara = $nome_gara;
                $inserRace->gp1 = $gp1;
                $inserRace->gp2 = $gp2;
                $inserRace->gp3 = $gp3;
                $inserRace->giro_veloce = $giroVeloce;
                $inserRace->n_ritirati = $nRitirati;
                $inserRace->vsc = $vsc;
                $inserRace->sc = $sc;
                $inserRace->save();
                $text = "I dati sono stati inseriti correttamente";
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return $text;
        }
    }

    /**
     * loadClassifiche
     * This method load all the classifiche data 
     * @return array with any possibile error and data with pt of classifiche
     */
    public function loadClassifiche(): array
    {
        $loadClassifiche['error'] = null;
        $loadClassifiche['dataGen'] = [];
        $loadClassifiche['dataPron'] = [];
        $loadClassifiche['dataPag'] = [];
        try {
            /* CLASSIFICA GENERALE */
            $dataDBClassificaGenerale = PronosticiModel::selectRaw('id_p, sum(punti) as puntiGen')->groupBy('id_p')->orderByRaw('sum(punti) desc')->get();
            foreach ($dataDBClassificaGenerale as $user) {
                $assocArrayGen[$user->id_p] = $user->puntiGen;
            }
            /* CLASSIFICA PAGELLE */
            $dataDBClassificaPagelle = PronosticiModel::selectRaw('id_p, sum(punti_pag) as puntiPag')->groupBy('id_p')->orderByRaw('sum(punti_pag) desc')->get();
            foreach ($dataDBClassificaPagelle as $user) {
                $assocArrayPag[$user->id_p] = $user->puntiPag;
            }
            /* CLASSIFICA PRONOSTICI */
            $dataDBClassificaPronostici = PronosticiModel::selectRaw('id_p, sum(punti_pron) as puntiPron')->groupBy('id_p')->orderByRaw('sum(punti_pron) desc')->get();
            foreach ($dataDBClassificaPronostici as $user) {
                $assocArrayPron[$user->id_p] = $user->puntiPron;
            }
            $loadClassifiche['dataGen'] = $assocArrayGen;
            $loadClassifiche['dataPron'] = $assocArrayPron;
            $loadClassifiche['dataPag'] = $assocArrayPag;
        } catch (Exception $e) {
            $loadClassifiche['error'] = $e->getMessage();
        } finally {
            return $loadClassifiche;
        }
    }
}
