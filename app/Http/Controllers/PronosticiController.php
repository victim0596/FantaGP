<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Classes\Time;
use App\Classes\FormCheck;
use App\Classes\QExec;
use App\Components\Commands\AddPronosticiGara\AddPronosticiGaraCommand;
use App\Components\Commands\AddPronosticiGara\AddPronosticiGaraCommandHandler;
use App\Components\Commands\AddPronosticiQualifica\AddPronosticiQualificaCommand;
use App\Components\Commands\AddPronosticiQualifica\AddPronosticiQualificaCommandHandler;

class PronosticiController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        $messageNotification = $request->query('status');
        if (isset($sessionUser)) {
            return view('pronostici', ['sessionUser' => $sessionUser, 'sessionAdmin' => $sessionAdmin, 'text' => $messageNotification]);
        } else {
            return view('pronostici', ['sessionUser' => $sessionUser, 'sessionAdmin' => $sessionAdmin, 'text' => "Effettua prima il login"]);
        }
    }

    function addPronoQualy(Request $request)
    {
        $id_p = $request->session()->get('user');
        $nome_gara = $request->nome_gara;
        $qp1 = $request->qp1;
        $qp2 = $request->qp2;
        $qp3 = $request->qp3;
        try {
            $form = new FormCheck($nome_gara);
            $time = new Time();
            if ($time->check_date_quali($nome_gara)) {
                $checkQualy = $form->checkQualyForm($qp1, $qp2, $qp3);
                if ($checkQualy['boolValue']) {
                    $query = new AddPronosticiQualificaCommand($id_p, $nome_gara, $qp1, $qp2, $qp3);
                    $result = AddPronosticiQualificaCommandHandler::Execute($query);
                    if (!$result->getSuccess()) throw new Exception($result->getMessage());
                    else $text = $result->getMessage();
                } else $text = $checkQualy['error'];
            } else {
                $text = "Tempo limite superato";
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [PronosticiController::class, 'show'],
                ['status' => $text]
            );
        }
    }

    function addPronoRace(Request $request)
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
                    $query = new AddPronosticiGaraCommand($id_p, $nome_gara, $gp1, $gp2, $gp3, $giro_veloce, $VSC, $SC, $n_ritirati);
                    $result = AddPronosticiGaraCommandHandler::Execute($query);
                    if (!$result->getSuccess()) throw new Exception($result->getMessage());
                    else $text = $result->getMessage();
                } else $text =  $checkRace['error'];
            } else {
                $text = "Tempo limite superato";
            }
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        } finally {
            return redirect()->action(
                [PronosticiController::class, 'show'],
                ['status' => $text]
            );
        }
    }
}
