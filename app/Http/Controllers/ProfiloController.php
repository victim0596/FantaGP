<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\QExec;
use App\Classes\Time;
use App\Classes\FormCheck;
use Exception;


class ProfiloController extends Controller
{

    function show(Request $request, string $messageNotification = "")
    {
        $sessionUser = $request->session()->get('user');
        $detailPt = $this->PtProfilo($sessionUser);
        $detailRiepilogo = $this->riepilogoPronostici($sessionUser);
        if (!empty($detailRiepilogo['text'])) $messageNotification = $detailRiepilogo['text'];
        else {
            if (!empty($detailPt['text'])) $messageNotification = $detailPt['text'];
        }
        return view('profilo', [
            'sessionUser' => $sessionUser, 'textPtTotali' => $detailPt['puntiTot'], 'textPtPron' => $detailPt['puntiPron'], 'textPtPag' => $detailPt['puntiPag'], 'nomegara' => $detailRiepilogo['nomegara'], 'qualifica1' => $detailRiepilogo['qualifica1'], 'qualifica2' => $detailRiepilogo['qualifica2'], 'qualifica3' => $detailRiepilogo['qualifica3'], 'gara1' => $detailRiepilogo['gara1'], 'gara2' => $detailRiepilogo['gara2'], 'gara3' => $detailRiepilogo['gara3'], 'giroveloce' => $detailRiepilogo['giroveloce'], 'nrit' => $detailRiepilogo['nrit'], 'vsc' => $detailRiepilogo['vsc'], 'sc' => $detailRiepilogo['sc'], 'text' => $messageNotification
        ]);
    }

    public static function PtProfilo(string $id_p): array
    {
        $detailPt['puntiTot'] = 0;
        $detailPt['puntiPron'] = 0;
        $detailPt['puntiPag'] = 0;
        $detailPt['text'] = "";
        try {
            $qExec = new QExec();
            $dataPt = $qExec->loadPtProfile($id_p);
            if (!empty($dataPt['data'])) {
                $detailPt['puntiTot'] = $dataPt['data']->puntiTot;
                $detailPt['puntiPron'] = $dataPt['data']->puntiPron;
                $detailPt['puntiPag'] = $dataPt['data']->puntiPag;
            }
            if ($dataPt['error'] != null) $detailPt['text'] = $dataPt['error'];
        } catch (Exception $ex) {
            $detailPt['text'] = $ex->getMessage();
        } finally {
            return $detailPt;
        }
    }

    function riepilogoPronostici(string $nomeutente): array
    {
        $detailRiepilogo['qualifica1'] = "";
        $detailRiepilogo['qualifica2'] = "";
        $detailRiepilogo['qualifica3'] = "";
        $detailRiepilogo['gara1'] = "";
        $detailRiepilogo['gara2'] = "";
        $detailRiepilogo['gara3'] = "";
        $detailRiepilogo['giroveloce'] = "";
        $detailRiepilogo['nrit'] = "";
        $detailRiepilogo['sc'] = "";
        $detailRiepilogo['vsc'] = "";
        $detailRiepilogo['text'] = "";
        $detailRiepilogo['nomegara'] = "";
        try {
            $time = new Time();
            $detailRiepilogo['nomegara'] = $time->CurrentRace();
            $qExec = new QExec();
            $dataRiepilogo = $qExec->loadPronoByRaceByUser($nomeutente, $detailRiepilogo['nomegara']);
            if (!empty($dataRiepilogo['data'])) {
                $detailRiepilogo['qualifica1'] = $dataRiepilogo['data']->qp1;
                $detailRiepilogo['qualifica2'] = $dataRiepilogo['data']->qp2;
                $detailRiepilogo['qualifica3'] = $dataRiepilogo['data']->qp3;
                $detailRiepilogo['gara1'] = $dataRiepilogo['data']->gp1;
                $detailRiepilogo['gara2'] = $dataRiepilogo['data']->gp2;
                $detailRiepilogo['gara3'] = $dataRiepilogo['data']->gp3;
                $detailRiepilogo['giroveloce'] = $dataRiepilogo['data']->giro_veloce;
                $detailRiepilogo['nrit'] = $dataRiepilogo['data']->n_ritirati;
                $detailRiepilogo['sc'] = $dataRiepilogo['data']->SC;
                $detailRiepilogo['vsc'] = $dataRiepilogo['data']->VSC;
            }
            if ($dataRiepilogo['error'] != null) $detailRiepilogo['text'] = $dataRiepilogo['error'];
        } catch (Exception $e) {
            $detailRiepilogo['text'] = $e->getMessage();
        } finally {
            return $detailRiepilogo;
        }
    }

    function modPronoQualy(Request $request)
    {
        $id_p = $request->session()->get('user');
        $nome_gara = $request->nome_gara;
        $qp1 = $request->qp1;
        $qp2 = $request->qp2;
        $qp3 = $request->qp3;
        try {
            $time = new Time();
            $form = new FormCheck($nome_gara);
            if ($time->check_date_quali($nome_gara)) {
                $checkQualy = $form->checkQualyForm($qp1, $qp2, $qp3);
                if ($checkQualy['boolValue']) {
                    $qExec = new QExec();
                    $text = $qExec->modQualyProno($id_p, $nome_gara, $qp1, $qp2, $qp3);
                } else $text = $checkQualy['error'];
            } else $text = "Tempo limite superato";
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return $this->show($request, $text);
        }
    }

    function modPronoRace(Request $request)
    {
        $id_p = $request->session()->get('user');
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
            $time = new Time();
            if ($time->check_date_race($nome_gara)) {
                $checkRace = $form->checkRaceForm($gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
                if ($checkRace['boolValue']) {
                    $qExec = new QExec();
                    $text = $qExec->modRaceProno($id_p, $nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
                } else $text = $checkRace['error'];
            } else $text = "Tempo limite superato";
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return $this->show($request, $text);
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
