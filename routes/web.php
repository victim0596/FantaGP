<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassificaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfiloController;
use App\Http\Controllers\PronosticiController;
use App\Http\Controllers\StatisticheController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\sessionUserValid;
use App\Http\Middleware\sessionAdmin;
use App\Http\Middleware\sessionValidProno;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* USER */
/* HOME */
Route::get('/', [IndexController::class, 'show']);
/* LOGIN */
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'showPost']);
/* PROFILO */
Route::get('/profilo', [ProfiloController::class, 'show'])->middleware(sessionUserValid::class);
Route::post('/profilo/modQualifica', [ProfiloController::class, 'modPronoQualy'])->middleware(sessionUserValid::class);
Route::post('/profilo/modGara', [ProfiloController::class, 'modPronoRace'])->middleware(sessionUserValid::class);
Route::post('/profilo/logout', [ProfiloController::class, 'logout'])->middleware(sessionUserValid::class);
/* PRONOSTICI */
Route::get('/pronostici', [PronosticiController::class, 'show']);
Route::post('/pronostici/Qualifica', [PronosticiController::class, 'addPronoQualy'])->middleware(sessionValidProno::class);
Route::post('/pronostici/Gara', [PronosticiController::class, 'addPronoRace'])->middleware(sessionValidProno::class);
/* CLASSIFICA */
Route::get('/classifica', [ClassificaController::class, 'show']);
/* STATISTICHE */
Route::get('/statistiche', [StatisticheController::class, 'show']);
/* ADMIN */
Route::get('/admin', [AdminController::class, 'show'])->middleware(sessionAdmin::class);
Route::post('/admin/addRitirati', [AdminController::class, 'addRitirati'])->middleware(sessionAdmin::class);
Route::post('/admin/addRisultatiGara', [AdminController::class, 'addRisultatiGara'])->middleware(sessionAdmin::class);
Route::post('/admin/addRisultatiQualifica', [AdminController::class, 'addRisultatiQualifica'])->middleware(sessionAdmin::class);
Route::post('/admin/CalcolaPunteggi', [AdminController::class, 'CalcolaPunteggi'])->middleware(sessionAdmin::class);
Route::post('/admin/addPagelle', [AdminController::class, 'addPagelle'])->middleware(sessionAdmin::class);






