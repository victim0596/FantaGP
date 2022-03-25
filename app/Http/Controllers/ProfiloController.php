<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Time;
use App\Classes\FormCheck;
use App\Components\Commands\UpdatePronosticiGara\UpdatePronosticiGaraCommand;
use App\Components\Commands\UpdatePronosticiGara\UpdatePronosticiGaraCommandHandler;
use App\Components\Commands\UpdatePronosticiQualifica\UpdatePronosticiQualificaCommand;
use App\Components\Commands\UpdatePronosticiQualifica\UpdatePronosticiQualificaCommandHandler;
use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQuery;
use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQueryHandler;
use App\Components\Queries\GetPtByID\GetPtByIDQuery;
use App\Components\Queries\GetPtByID\GetPtByIDQueryHandler;
use Exception;


class ProfiloController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        $detailPt = $this->PtProfilo($sessionUser);
        $detailRiepilogo = $this->riepilogoPronostici($sessionUser);
        $messageNotification = $request->query('status');
        if (!empty($detailRiepilogo['text'])) $messageNotification = $detailRiepilogo['text'];
        else {
            if (!empty($detailPt['text'])) $messageNotification = $detailPt['text'];
        }
        return view('profilo', [
            'sessionUser' => $sessionUser, 'sessionAdmin' => $sessionAdmin,
            'textPtTotali' => $detailPt['puntiTot'], 'textPtPron' => $detailPt['puntiPron'], 'textPtPag' => $detailPt['puntiPag'], 'nomegara' => $detailRiepilogo['nomegara'], 'qualifica1' => $detailRiepilogo['qualifica1'], 'qualifica2' => $detailRiepilogo['qualifica2'], 'qualifica3' => $detailRiepilogo['qualifica3'], 'gara1' => $detailRiepilogo['gara1'], 'gara2' => $detailRiepilogo['gara2'], 'gara3' => $detailRiepilogo['gara3'], 'giroveloce' => $detailRiepilogo['giroveloce'], 'nrit' => $detailRiepilogo['nrit'], 'vsc' => $detailRiepilogo['vsc'], 'sc' => $detailRiepilogo['sc'], 'text' => $messageNotification
        ]);
    }

    public static function PtProfilo(string $id_p): array
    {
        $detailPt['puntiTot'] = 0;
        $detailPt['puntiPron'] = 0;
        $detailPt['puntiPag'] = 0;
        $detailPt['text'] = "";
        try {
            $query = new GetPtByIDQuery($id_p);
            $result = GetPtByIDQueryHandler::Retrieve($query);
            if (!empty($result)) {
                $detailPt['puntiTot'] = $result->getPuntiTotali();
                $detailPt['puntiPron'] = $result->getPuntiPronostici();
                $detailPt['puntiPag'] = $result->getPuntiPagelle();
            }
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
            $query = new GetPronosticiByRaceByUserQuery($detailRiepilogo['nomegara'], $nomeutente);
            $result = GetPronosticiByRaceByUserQueryHandler::Retrieve($query);
            if (!empty($result)) {
                $detailRiepilogo['qualifica1'] = $result->getQP1();
                $detailRiepilogo['qualifica2'] = $result->getQP2();
                $detailRiepilogo['qualifica3'] = $result->getQP3();
                $detailRiepilogo['gara1'] = $result->getGP1();
                $detailRiepilogo['gara2'] = $result->getGP2();
                $detailRiepilogo['gara3'] = $result->getGP3();
                $detailRiepilogo['giroveloce'] = $result->getGiroVeloce();
                $detailRiepilogo['nrit'] = $result->getNRitirati();
                $detailRiepilogo['sc'] = $result->getSC() == 1 ? "Si" : "No";
                $detailRiepilogo['vsc'] = $result->getVSC() == 1 ? "Si" : "No";
            }
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
                    $query = new UpdatePronosticiQualificaCommand($id_p, $nome_gara, $qp1, $qp2, $qp3);
                    $result = UpdatePronosticiQualificaCommandHandler::Execute($query);
                    if (!$result->getSuccess()) throw new Exception($result->getMessage());
                    else $text = $result->getMessage();
                } else $text = $checkQualy['error'];
            } else $text = "Tempo limite superato";
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [ProfiloController::class, 'show'],
                ['status' => $text]
            );
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
                    $SCBool = $SC == "Si" ? 1 : 0;
                    $VSCBool = $VSC == "Si" ? 1 : 0;
                    $query = new UpdatePronosticiGaraCommand($id_p, $nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSCBool, $SCBool, $n_ritirati);
                    $result = UpdatePronosticiGaraCommandHandler::Execute($query);
                    if (!$result->getSuccess()) throw new Exception($result->getMessage());
                    else $text = $result->getMessage();
                } else $text = $checkRace['error'];
            } else $text = "Tempo limite superato";
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [ProfiloController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
