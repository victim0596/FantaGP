<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PronosticiModel;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/prono/{utente}/{gara}', function(string $utente, string $gara){
    $date = PronosticiModel::where('id_p', $utente)->where('nome_gara', $gara)->first();
    return response()->json($date);
});

Route::get('/pronoAllClassifica/{utente}', function(string $utente){
    $date = PronosticiModel::select('id_p', 'punti', 'punti_pron', 'punti_pag')->where('id_p', $utente)->get()->values()->all();
    return response()->json($date);
});