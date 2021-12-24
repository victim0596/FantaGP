<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PronosticiModel;
use App\Models\RisultatiModel;
use App\Models\PagelleModel;
use App\Models\RitiratiModel;

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

Route::group(['middleware'=> ['auth:sanctum']], function () {

});

Route::get('/loadProno', function () {
    $dataPronDB = PronosticiModel::whereRaw('punti IS NOT NULL')->orderBy('id_p', 'ASC')->orderBy('nome_gara', 'ASC')->get();
    $dataPron = $dataPronDB->values()->all();
    $dataPronLength = count($dataPron);
    $num_row = $dataPronLength / 10;
    $arrayGara = array_chunk($dataPron, $num_row);
    return response()->json($arrayGara);
});

Route::get('/loadResult', function () {
    $dataResultDB = RisultatiModel::all();
    $dataResul = $dataResultDB->values()->all();
    return response()->json($dataResul);
});

Route::get('/prono/{utente}/{gara}', function (string $utente, string $gara) {
    $date = PronosticiModel::where('id_p', $utente)->where('nome_gara', $gara)->first();
    return response()->json($date);
});

Route::get('/pronoAllClassifica/{utente}', function (string $utente) {
    $date = PronosticiModel::select('id_p', 'punti', 'punti_pron', 'punti_pag')->where('id_p', $utente)->get()->values()->all();
    return response()->json($date);
});

//Check api
Route::get('/checkPagelle/{nomeGara}', function (string $nomeGara) {
    $date = PagelleModel::select('pilota', 'nome_gara', 'sito1', 'sito2', 'sito3')->where('nome_gara', $nomeGara)->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkRitirati/{nomeGara}', function (string $nomeGara) {
    $date = RitiratiModel::select('nome_pilota', 'nome_gara', 'tipo')->where('nome_gara', $nomeGara)->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkRisultati/{nomeGara}', function (string $nomeGara) {
    $date = RisultatiModel::where('nome_gara', $nomeGara)->get()->values()->all();
    return response()->json($date);
});
Route::get('/checkPronostici/{nomeGara}', function (string $nomeGara) {
    $date = PronosticiModel::where('nome_gara', $nomeGara)->get()->values()->all();
    return response()->json($date);
});





