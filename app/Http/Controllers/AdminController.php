<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\QExec;
use App\Classes\FormCheck;
use App\Classes\CalcoloPunteggi;
use App\Components\Commands\AddPagelle\AddPagelleCommand;
use App\Components\Commands\AddPagelle\AddPagelleCommandHandler;
use App\Components\Commands\AddPunteggi\AddPunteggiCommand;
use App\Components\Commands\AddPunteggi\AddPunteggiCommandHandler;
use App\Components\Commands\AddRisultatiGara\AddRisultatiGaraCommand;
use App\Components\Commands\AddRisultatiGara\AddRisultatiGaraCommandHandler;
use App\Components\Commands\AddRisultatiQualifica\AddRisultatiQualificaCommand;
use App\Components\Commands\AddRisultatiQualifica\AddRisultatiQualificaCommandHandler;
use App\Components\Commands\AddRitirati\AddRitiratiCommand;
use App\Components\Commands\AddRitirati\AddRitiratiCommandHandler;
use Exception;

class AdminController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        $detailPt = ProfiloController::PtProfilo($sessionUser);
        $messageNotification = $request->query('status');
        if (!empty($detailPt['text'])) $messageNotification = $detailPt['text'];
        return view('admin', [
            'sessionAdmin' => $sessionAdmin,
            'sessionUser' => $sessionUser,
            'textPtTotali' => $detailPt['puntiTot'], 'textPtPron' => $detailPt['puntiPron'], 'textPtPag' => $detailPt['puntiPag'], 'text' => $messageNotification
        ]);
    }

    function addPagelle(Request $request)
    {
        $nome_gara = $request->nome_gara;
        $pilota = $request->pilota;
        $sito1 = $request->sito1;
        $sito2 = $request->sito2;
        $sito3 = $request->sito3;
        try {
            $form = new FormCheck($nome_gara);
            $checkPagelle = $form->checkAddPagelleForm($pilota, $sito1, $sito2, $sito3);
            if ($checkPagelle['boolValue']) {
                $query = new AddPagelleCommand($pilota, $nome_gara, $sito1, $sito2, $sito3);
                $result = AddPagelleCommandHandler::Execute($query);
                if (!$result->getSuccess()) throw new Exception($result->getMessage());
            } else {
                $text = $checkPagelle['error'];
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [AdminController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function addRitirati(Request $request)
    {
        $nome_gara = $request->nome_gara;
        $nome_pilota = $request->pilota;
        $tipo = $request->tipo;
        try {
            $form = new FormCheck($nome_gara);
            $checkRitirati = $form->checkAddRitiratiForm($nome_pilota, $tipo);
            if ($checkRitirati['boolValue']) {
                $tipoBool = $tipo == 'Gara' ? 1 : 0;
                $query = new AddRitiratiCommand($nome_pilota, $nome_gara, $tipoBool);
                $result = AddRitiratiCommandHandler::Execute($query);
                if (!$result->getSuccess()) throw new Exception($result->getMessage());
            } else {
                $text = $checkRitirati['error'];
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [AdminController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function addRisultatiGara(Request $request)
    {
        $nome_gara = $request->nome_gara;
        $gp1 = $request->gp1;
        $gp2 = $request->gp2;
        $gp3 = $request->gp3;
        $giro_veloce = $request->giro_veloce;
        $n_ritirati = $request->n_ritirati;
        $VSC = $request->vsc;
        $SC = $request->sc;
        try {
            $form = new FormCheck($nome_gara);
            $checkAddRace = $form->checkRaceForm($gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
            if ($checkAddRace['boolValue']) {
                $VSCBool = $VSC == 'Si' ? 1 : 0;
                $SCBool = $SC == 'Si' ? 1 : 0;
                $query = new AddRisultatiGaraCommand($nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSCBool, $SCBool, $n_ritirati);
                $result = AddRisultatiGaraCommandHandler::Execute($query);
                if (!$result->getSuccess()) throw new Exception($result->getMessage());
            } else $text = $checkAddRace['error'];
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [AdminController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function addRisultatiQualifica(Request $request)
    {
        $nome_gara = $request->nome_gara;
        $qp1 = $request->qp1;
        $qp2 = $request->qp2;
        $qp3 = $request->qp3;
        try {
            $form = new FormCheck($nome_gara);
            $checkAddQualy = $form->checkQualyForm($qp1, $qp2, $qp3);
            if ($checkAddQualy['boolValue']) {
                $query = new AddRisultatiQualificaCommand($nome_gara, $qp1, $qp2, $qp3);
                $result = AddRisultatiQualificaCommandHandler::Execute($query);
                if (!$result->getSuccess()) throw new Exception($result->getMessage());
            } else {
                $text = $checkAddQualy['error'];
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [AdminController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function CalcolaPunteggi(Request $request)
    {
        $nome_gara = $request->nome_gara;
        try {
            $form = new FormCheck($nome_gara);
            $calcoloPunteggi = new CalcoloPunteggi();
            $utenti = config('myGlobalVar.utenti');
            $utentiLen = config('myGlobalVar.utentiLen');
            for ($i = 0; $i < $utentiLen; $i++) {
                $calcoloPunteggi->calcoloPtPronostici($nome_gara, $utenti[$i]);
                $puntiGara = $calcoloPunteggi->ptGare;
                $puntiQualifica = $calcoloPunteggi->ptQualifiche;
                $puntiPagelle = $calcoloPunteggi->calcoloPtPagelle($nome_gara, $utenti[$i]);
                $query = new AddPunteggiCommand($nome_gara, $utenti[$i], $puntiGara, $puntiQualifica, $puntiPagelle);
                $result = AddPunteggiCommandHandler::Execute($query);
                if (!$result->getSuccess()) throw new Exception($result->getMessage());
                else $text = $result->getMessage();
            }
            $text = "I dati sono stati inseriti correttamente";
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [AdminController::class, 'show'],
                ['status' => $text]
            );
        }
    }
}
