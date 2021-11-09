<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Class\QExec;
use App\Models\PronosticiModel;
use Illuminate\Http\Request;

class ClassificaController extends Controller
{

    function show(Request $request)
    {
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
        $chartData = $this->loadChart();
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
            'decimoPg' => $arrayClassificaPagelleKey[9], 'decimoPgPt' => $arrayClassificaPagelleValue[9],
            /* chart data */
            'Dario' => $chartData['Dario'],
            'Oliver' => $chartData['Oliver'],
            'Andrea' => $chartData['Andrea'],
            'Ermenegildo' => $chartData['Ermenegildo'],
            'Toto' => $chartData['Toto'],
            'Gianpaolo' => $chartData['Gianpaolo'],
            'AlessioDom' => $chartData['AlessioDom'],
            'Ciccio' => $chartData['Ciccio'],
            'SpiritoBlu' => $chartData['SpiritoBlu'],
            'Pino' => $chartData['Pino']
        ]);
    }

    function loadChart()
    {
        $data = PronosticiModel::select('id_p', 'punti', 'punti_pron', 'punti_pag')->get();

        $filterDario = $data->filter(function ($item) {
            return stripos($item->id_p, "Dario") !== false;
        });
        $filterGianpaolo = $data->filter(function ($item) {
            return stripos($item->id_p, "Gianpaolo") !== false;
        });
        $filterOliver = $data->filter(function ($item) {
            return stripos($item->id_p, "Oliver") !== false;
        });
        $filterErmenegildo = $data->filter(function ($item) {
            return stripos($item->id_p, "Ermenegildo") !== false;
        });
        $filterAlessioDom = $data->filter(function ($item) {
            return stripos($item->id_p, "alessiodom97") !== false;
        });
        $filterSpiritoBlu = $data->filter(function ($item) {
            return stripos($item->id_p, "SpiritoBlu") !== false;
        });
        $filterPinguinoSquadracorse = $data->filter(function ($item) {
            return stripos($item->id_p, "PinguinoSquadracorse") !== false;
        });
        $filterAndrea = $data->filter(function ($item) {
            return stripos($item->id_p, "Andrea") !== false;
        });
        $filterToto = $data->filter(function ($item) {
            return stripos($item->id_p, "Toto") !== false;
        });
        $filterCiccio = $data->filter(function ($item) {
            return stripos($item->id_p, "Ciccio") !== false;
        });

        $arrayJson['Dario'] = json_encode($filterDario->values()->all());
        $arrayJson['Gianpaolo'] = json_encode($filterGianpaolo->values()->all());
        $arrayJson['Oliver'] = json_encode($filterOliver->values()->all());
        $arrayJson['Ermenegildo'] = json_encode($filterErmenegildo->values()->all());
        $arrayJson['AlessioDom'] = json_encode($filterAlessioDom->values()->all());
        $arrayJson['Pino'] = json_encode($filterPinguinoSquadracorse->values()->all());
        $arrayJson['Andrea'] = json_encode($filterAndrea->values()->all());
        $arrayJson['Toto'] = json_encode($filterToto->values()->all());
        $arrayJson['SpiritoBlu'] = json_encode($filterSpiritoBlu->values()->all());
        $arrayJson['Ciccio'] = json_encode($filterCiccio->values()->all());

        return $arrayJson;
    }
}
