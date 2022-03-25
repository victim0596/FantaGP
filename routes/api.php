<?php

use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQuery;
use App\Components\Queries\GetPronosticiByRaceByUser\GetPronosticiByRaceByUserQueryHandler;
use App\Models\Pagelle;
use App\Models\PronosticiQualifica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Punteggi;
use App\Models\Risultati;
use App\Models\Ritirati;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Protected route with sanctum

Route::group(['middleware' => ['auth:sanctum']], function () {
});

Route::get('/loadProno', function () {
    $dataPronDB = Punteggi::selectRaw('USERNAME, DENOMINAZIONE, QP1, QP2, QP3, GP1, GP2, GP3, GIRO_VELOCE, NRITIRATI, VSC, SC, PUNTI_GARA + PUNTI_QUALIFICA + PUNTI_PAGELLE as punti')
        ->join('utenti', 'punteggi.ID_UTENTE', '=', 'utenti.ID')
        ->join('gare', 'punteggi.ID_GARA', '=', 'gare.ID')
        ->join('pronostici_gara', 'punteggi.ID_UTENTE', '=', 'pronostici_gara.ID_UTENTE')
        ->join('pronostici_qualifica', 'punteggi.ID_UTENTE', '=', 'pronostici_qualifica.ID_UTENTE')
        ->whereRaw('PUNTI_PAGELLE IS NOT NULL')
        ->whereRaw('punteggi.ID_GARA = pronostici_gara.ID_GARA and punteggi.ID_GARA = pronostici_qualifica.ID_GARA')
        ->orderBy('USERNAME', 'ASC')
        ->orderBy('DENOMINAZIONE', 'ASC')
        ->get()->toArray();
    $dataPronLength = count($dataPronDB);
    $num_row = $dataPronLength / 10;
    $arrayGara = array_chunk($dataPronDB, $num_row);
    return response()->json($arrayGara);
});

Route::get('/loadResult', function () {
    $dataResultDB = Risultati::select()
        ->join('gare', 'ID_GARA', '=', 'gare.ID')->get();
    return response()->json($dataResultDB);
});

Route::get('/prono/{utente}/{gara}', function (string $utente, string $gara) {
    $query = new GetPronosticiByRaceByUserQuery($gara, $utente);
    $result = GetPronosticiByRaceByUserQueryHandler::Retrieve($query);
    $date = [
        'USERNAME' => $result->getUtente(), 'DENOMINAZIONE' => $result->getNomeGara(), 'QP1' => $result->getQP1(), 'QP2' => $result->getQP2(),
        'QP3' => $result->getQP3(), 'GP1' => $result->getGP1(), 'GP2' => $result->getGP2(), 'GP3' => $result->getGP3(), 'GIRO_VELOCE' => $result->getGiroVeloce(),
        'NRITIRATI' => $result->getNRitirati(), 'VSC' => $result->getVSC(), 'SC' => $result->getSC(),
        'TIMESTAMP_PRONOSTICI_QUALIFICA' => $result->getDataPronosticiQualifica(), 'TIMESTAMP_PRONOSTICI_GARA' => $result->getDataPronosticiGara()
    ];
    return response()->json($date);
});

Route::get('/pronoAllClassifica/{utente}', function (string $utente) {
    $date = Punteggi::selectRaw('USERNAME, PUNTI_GARA + PUNTI_QUALIFICA + PUNTI_PAGELLE as punti, 
    PUNTI_GARA + PUNTI_QUALIFICA as punti_pron, PUNTI_PAGELLE as punti_pag')
    ->join('utenti', 'ID_UTENTE', '=', 'utenti.ID')
    ->where('USERNAME', $utente)
    ->get()->values()->all();
    return response()->json($date);
});

//Check api
Route::get('/checkPagelle/{nomeGara}', function (string $nomeGara) {
    $date = Pagelle::select()
    ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
    ->join('gare', 'ID_GARA', '=', 'gare.ID')
    ->where('DENOMINAZIONE', $nomeGara)
    ->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkRitirati/{nomeGara}', function (string $nomeGara) {
    $date = Ritirati::select('NOME', 'DENOMINAZIONE', 'TIPO')
        ->join('gare', 'ID_GARA', '=', 'gare.ID')
        ->join('piloti', 'ID_PILOTA', '=', 'piloti.ID')
        ->where('DENOMINAZIONE', $nomeGara)
        ->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkRisultati/{nomeGara}', function (string $nomeGara) {
    $date = Risultati::select()
        ->join('gare', 'ID_GARA', '=', 'gare.ID')
        ->where('DENOMINAZIONE', $nomeGara)
        ->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkPronostici/{nomeGara}', function (string $nomeGara) {
    $date = PronosticiQualifica::selectRaw('USERNAME, DENOMINAZIONE, QP1, QP2, QP3, GP1, GP2, GP3, GIRO_VELOCE, NRITIRATI, VSC, SC, 
    pronostici_qualifica.TIMESTAMP as dataQualifica, pronostici_gara.TIMESTAMP as dataGara')
        ->join('pronostici_gara', 'pronostici_qualifica.ID_GARA', '=', 'pronostici_gara.ID_GARA')
        ->join('gare', 'pronostici_qualifica.ID_GARA', '=', 'gare.ID')
        ->join('utenti', 'pronostici_qualifica.ID_UTENTE', '=', 'utenti.ID')
        ->where('DENOMINAZIONE', $nomeGara)
        ->whereRaw('pronostici_gara.ID_GARA = pronostici_qualifica.ID_GARA AND pronostici_qualifica.ID_UTENTE = utenti.ID AND pronostici_gara.ID_UTENTE = utenti.ID')
        ->get()->values()->all();
    return response()->json($date);
});
