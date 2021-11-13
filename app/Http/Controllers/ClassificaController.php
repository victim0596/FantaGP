<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\QExec;
use App\Models\PronosticiModel;
use Illuminate\Http\Request;

class ClassificaController extends Controller
{

    function show(Request $request)
    {
        $utenti = config('myGlobalVar.utenti');
        $sessionUser = $request->session()->get('user');
        $qExec = new QExec();
        $dataClassifiche = $qExec->loadClassifiche();
        if ($dataClassifiche['error'] != null) print_r($dataClassifiche['error']);
        else {
            $arrayClassificaPronosticiValue = array_values($dataClassifiche['dataPron']);
            $arrayClassificaPronosticiKey = array_keys($dataClassifiche['dataPron']);

            $arrayClassificaPagelleValue = array_values($dataClassifiche['dataPag']);
            $arrayClassificaPagelleKey = array_keys($dataClassifiche['dataPag']);

            $arrayClassificaGeneraleValue = array_values($dataClassifiche['dataGen']);
            $arrayClassificaGeneraleKey = array_keys($dataClassifiche['dataGen']);
        }
        return view('classifica', [
            'sessionUser' => $sessionUser,
            /*classifica generale*/
            'primoG' => $arrayClassificaGeneraleKey[0], 'primoGPt' => $arrayClassificaGeneraleValue[0],
            'secondoG' => $arrayClassificaGeneraleKey[1], 'secondoGPt' => $arrayClassificaGeneraleValue[1],
            'terzoG' => $arrayClassificaGeneraleKey[2], 'terzoGPt' => $arrayClassificaGeneraleValue[2],
            'quartoG' => $arrayClassificaGeneraleKey[3], 'quartoGPt' => $arrayClassificaGeneraleValue[3],
            'quintoG' => $arrayClassificaGeneraleKey[4], 'quintoGPt' => $arrayClassificaGeneraleValue[4],
            'sestoG' => $arrayClassificaGeneraleKey[5], 'sestoGPt' => $arrayClassificaGeneraleValue[5],
            'settimoG' => $arrayClassificaGeneraleKey[6], 'settimoGPt' => $arrayClassificaGeneraleValue[6],
            'ottavoG' => $arrayClassificaGeneraleKey[7], 'ottavoGPt' => $arrayClassificaGeneraleValue[7],
            'nonoG' => $arrayClassificaGeneraleKey[8], 'nonoGPt' => $arrayClassificaGeneraleValue[8],
            'decimoG' => $arrayClassificaGeneraleKey[9], 'decimoGPt' => $arrayClassificaGeneraleValue[9],
            /*classifica pronostici*/
            'primoP' => $arrayClassificaPronosticiKey[0], 'primoPPt' => $arrayClassificaPronosticiValue[0],
            'secondoP' => $arrayClassificaPronosticiKey[1], 'secondoPPt' => $arrayClassificaPronosticiValue[1],
            'terzoP' => $arrayClassificaPronosticiKey[2], 'terzoPPt' => $arrayClassificaPronosticiValue[2],
            'quartoP' => $arrayClassificaPronosticiKey[3], 'quartoPPt' => $arrayClassificaPronosticiValue[3],
            'quintoP' => $arrayClassificaPronosticiKey[4], 'quintoPPt' => $arrayClassificaPronosticiValue[4],
            'sestoP' => $arrayClassificaPronosticiKey[5], 'sestoPPt' => $arrayClassificaPronosticiValue[5],
            'settimoP' => $arrayClassificaPronosticiKey[6], 'settimoPPt' => $arrayClassificaPronosticiValue[6],
            'ottavoP' => $arrayClassificaPronosticiKey[7], 'ottavoPPt' => $arrayClassificaPronosticiValue[7],
            'nonoP' => $arrayClassificaPronosticiKey[8], 'nonoPPt' => $arrayClassificaPronosticiValue[8],
            'decimoP' => $arrayClassificaPronosticiKey[9], 'decimoPPt' => $arrayClassificaPronosticiValue[9],
            /*classifica pagelle*/
            'primoPg' => $arrayClassificaPagelleKey[0], 'primoPgPt' => $arrayClassificaPagelleValue[0],
            'secondoPg' => $arrayClassificaPagelleKey[1], 'secondoPgPt' => $arrayClassificaPagelleValue[1],
            'terzoPg' => $arrayClassificaPagelleKey[2], 'terzoPgPt' => $arrayClassificaPagelleValue[2],
            'quartoPg' => $arrayClassificaPagelleKey[3], 'quartoPgPt' => $arrayClassificaPagelleValue[3],
            'quintoPg' => $arrayClassificaPagelleKey[4], 'quintoPgPt' => $arrayClassificaPagelleValue[4],
            'sestoPg' => $arrayClassificaPagelleKey[5], 'sestoPgPt' => $arrayClassificaPagelleValue[5],
            'settimoPg' => $arrayClassificaPagelleKey[6], 'settimoPgPt' => $arrayClassificaPagelleValue[6],
            'ottavoPg' => $arrayClassificaPagelleKey[7], 'ottavoPgPt' => $arrayClassificaPagelleValue[7],
            'nonoPg' => $arrayClassificaPagelleKey[8], 'nonoPgPt' => $arrayClassificaPagelleValue[8],
            'decimoPg' => $arrayClassificaPagelleKey[9], 'decimoPgPt' => $arrayClassificaPagelleValue[9]
        ]);
    }
}
