<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\QExec;
use App\Classes\FormCheck;
use App\Classes\CalcoloPunteggi;
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
                $qExec = new QExec();
                $text = $qExec->insertPagelle($nome_gara, $pilota, $sito1, $sito2, $sito3);
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
                $qExec = new QExec();
                $text = $qExec->insertRitirati($nome_gara, $nome_pilota, $tipo);
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
                $qExec = new QExec();
                $text = $qExec->insertResultRace($nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
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
                $qExec = new QExec();
                $text = $qExec->insertResultQualy($nome_gara, $qp1, $qp2, $qp3);
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
            $qExec = new QExec();
            $utenti = config('myGlobalVar.utenti');
            $utentiLen = config('myGlobalVar.utentiLen');
            for ($i = 0; $i < $utentiLen; $i++) {
                $ptPronostici = $calcoloPunteggi->calcoloPtPronostici($nome_gara, $utenti[$i]);
                $ptPagelle = $calcoloPunteggi->calcoloPtPagelle($nome_gara, $utenti[$i]);
                $ptTotali = number_format($ptPronostici + $ptPagelle, 2);
                $qExec->insertPunteggi($nome_gara, $utenti[$i], $ptTotali, $ptPronostici, $ptPagelle);
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
