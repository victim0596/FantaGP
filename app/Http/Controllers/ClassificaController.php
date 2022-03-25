<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Components\Queries\GetClassificaGenerale\GetClassificaGeneraleQueryHandler;
use App\Components\Queries\GetClassificaPagelle\GetClassificaPagelleQueryHandler;
use App\Components\Queries\GetClassificaPronostici\GetClassificaPronosticiQueryHandler;
use Illuminate\Http\Request;

class ClassificaController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        $resultClassificaGenerale = GetClassificaGeneraleQueryHandler::Retrieve();
        $resultClassificaPagelle = GetClassificaPagelleQueryHandler::Retrieve();
        $resultClassificaPronostici = GetClassificaPronosticiQueryHandler::Retrieve();

        $arrayClassificaPronosticiValue = array_values($resultClassificaPronostici['dataPron']);
        $arrayClassificaPronosticiKey = array_keys($resultClassificaPronostici['dataPron']);

        $arrayClassificaPagelleValue = array_values($resultClassificaPagelle['dataPag']);
        $arrayClassificaPagelleKey = array_keys($resultClassificaPagelle['dataPag']);

        $arrayClassificaGeneraleValue = array_values($resultClassificaGenerale['dataGen']);
        $arrayClassificaGeneraleKey = array_keys($resultClassificaGenerale['dataGen']);

        return view('classifica', [
            'sessionAdmin' => $sessionAdmin,
            'sessionUser' => $sessionUser,
            /*classifica generale*/
            'primoG' => $arrayClassificaGeneraleKey[0] ?? 0, 'primoGPt' => $arrayClassificaGeneraleValue[0] ?? 0,
            'secondoG' => $arrayClassificaGeneraleKey[1] ?? 0, 'secondoGPt' => $arrayClassificaGeneraleValue[1] ?? 0,
            'terzoG' => $arrayClassificaGeneraleKey[2] ?? 0, 'terzoGPt' => $arrayClassificaGeneraleValue[2] ?? 0,
            'quartoG' => $arrayClassificaGeneraleKey[3] ?? 0, 'quartoGPt' => $arrayClassificaGeneraleValue[3] ?? 0,
            'quintoG' => $arrayClassificaGeneraleKey[4] ?? 0, 'quintoGPt' => $arrayClassificaGeneraleValue[4] ?? 0,
            'sestoG' => $arrayClassificaGeneraleKey[5] ?? 0, 'sestoGPt' => $arrayClassificaGeneraleValue[5] ?? 0,
            'settimoG' => $arrayClassificaGeneraleKey[6] ?? 0, 'settimoGPt' => $arrayClassificaGeneraleValue[6] ?? 0,
            'ottavoG' => $arrayClassificaGeneraleKey[7] ?? 0, 'ottavoGPt' => $arrayClassificaGeneraleValue[7] ?? 0,
            'nonoG' => $arrayClassificaGeneraleKey[8] ?? 0, 'nonoGPt' => $arrayClassificaGeneraleValue[8] ?? 0,
            'decimoG' => $arrayClassificaGeneraleKey[9] ?? 0, 'decimoGPt' => $arrayClassificaGeneraleValue[9] ?? 0,
            /*classifica pronostici*/
            'primoP' => $arrayClassificaPronosticiKey[0] ?? 0, 'primoPPt' => $arrayClassificaPronosticiValue[0] ?? 0,
            'secondoP' => $arrayClassificaPronosticiKey[1] ?? 0, 'secondoPPt' => $arrayClassificaPronosticiValue[1] ?? 0,
            'terzoP' => $arrayClassificaPronosticiKey[2] ?? 0, 'terzoPPt' => $arrayClassificaPronosticiValue[2] ?? 0,
            'quartoP' => $arrayClassificaPronosticiKey[3] ?? 0, 'quartoPPt' => $arrayClassificaPronosticiValue[3] ?? 0,
            'quintoP' => $arrayClassificaPronosticiKey[4] ?? 0, 'quintoPPt' => $arrayClassificaPronosticiValue[4] ?? 0,
            'sestoP' => $arrayClassificaPronosticiKey[5] ?? 0, 'sestoPPt' => $arrayClassificaPronosticiValue[5] ?? 0,
            'settimoP' => $arrayClassificaPronosticiKey[6] ?? 0, 'settimoPPt' => $arrayClassificaPronosticiValue[6] ?? 0,
            'ottavoP' => $arrayClassificaPronosticiKey[7] ?? 0, 'ottavoPPt' => $arrayClassificaPronosticiValue[7] ?? 0,
            'nonoP' => $arrayClassificaPronosticiKey[8] ?? 0, 'nonoPPt' => $arrayClassificaPronosticiValue[8] ?? 0,
            'decimoP' => $arrayClassificaPronosticiKey[9] ?? 0, 'decimoPPt' => $arrayClassificaPronosticiValue[9] ?? 0,
            /*classifica pagelle*/
            'primoPg' => $arrayClassificaPagelleKey[0] ?? 0, 'primoPgPt' => $arrayClassificaPagelleValue[0] ?? 0,
            'secondoPg' => $arrayClassificaPagelleKey[1] ?? 0, 'secondoPgPt' => $arrayClassificaPagelleValue[1] ?? 0,
            'terzoPg' => $arrayClassificaPagelleKey[2] ?? 0, 'terzoPgPt' => $arrayClassificaPagelleValue[2] ?? 0,
            'quartoPg' => $arrayClassificaPagelleKey[3] ?? 0, 'quartoPgPt' => $arrayClassificaPagelleValue[3] ?? 0,
            'quintoPg' => $arrayClassificaPagelleKey[4] ?? 0, 'quintoPgPt' => $arrayClassificaPagelleValue[4] ?? 0,
            'sestoPg' => $arrayClassificaPagelleKey[5] ?? 0, 'sestoPgPt' => $arrayClassificaPagelleValue[5] ?? 0,
            'settimoPg' => $arrayClassificaPagelleKey[6] ?? 0, 'settimoPgPt' => $arrayClassificaPagelleValue[6] ?? 0,
            'ottavoPg' => $arrayClassificaPagelleKey[7] ?? 0, 'ottavoPgPt' => $arrayClassificaPagelleValue[7] ?? 0,
            'nonoPg' => $arrayClassificaPagelleKey[8] ?? 0, 'nonoPgPt' => $arrayClassificaPagelleValue[8] ?? 0,
            'decimoPg' => $arrayClassificaPagelleKey[9] ?? 0, 'decimoPgPt' => $arrayClassificaPagelleValue[9] ?? 0
        ]);
    }
}
