<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PronosticiModel;
use App\Models\RisultatiModel;
use Illuminate\Http\Request;


class StatisticheController extends Controller
{

    function show(Request $request)
    {
        $sessionUser = $request->session()->get('user');
        $data = $this->loadStat();
        if (isset($sessionUser)) {            
            return view('statistiche', ['sessionUser' => $sessionUser, 'arrayGara' => json_encode($data['Pronostici']), 'arrayRisultati' => json_encode($data['Result'])]);
        } else {
            return view('statistiche', ['arrayGara' => json_encode($data['Pronostici']), 'arrayRisultati' => json_encode($data['Result'])]);
        }
    }

    function loadStat()
    {
        $dataPronDB = PronosticiModel::whereRaw('punti IS NOT NULL')->orderBy('id_p', 'ASC')->orderBy('nome_gara', 'ASC')->get();
        $dataPron = $dataPronDB->values()->all();
        $dataPronLength = count($dataPron);
        $num_row = $dataPronLength/10;
        $arrayGara = array_chunk($dataPron, $num_row);
        $dataResultDB = RisultatiModel::all();
        $dataResul = $dataResultDB->values()->all();
        $data['Pronostici'] = $arrayGara;
        $data['Result'] = $dataResul;
        return $data;
    }
}
