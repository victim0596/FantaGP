<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Class\LoginAuth;
use App\Models\Class\QExec;
use Exception;
use Illuminate\Http\Request;



class LoginController extends Controller
{

    function show(Request $request, string $text = "")
    {
        $sessionUser = $request->session()->get('user');
        if (isset($sessionUser)) {
            return redirect()->to('/');
        } else return view('login', ['text' => $text]);
    }

    function showPost(Request $request)
    {
        $sessionUser = $request->session()->get('user');
        if (isset($sessionUser)) {
            return redirect()->to('/');
        }
        $n_ut_input = $request->n_utente;
        $n_psw = $request->psw;
        try {
            $login = new LoginAuth($n_ut_input, $n_psw);
            $loginCheck = $login->loginCheckFormat();
            if ($loginCheck['boolValue']) {
                $queryEx = new QExec();
                $loginAuth = $queryEx->checkDbAuth($n_ut_input, $n_psw);
                if (!$loginAuth)  $text = "Dati errati";
                else {
                    $request->session()->put('user', $n_ut_input);
                    if(in_array($n_ut_input,config('myGlobalVar.admin'))) $request->session()->put('admin', 1);
                    return redirect()->to('/profilo');
                }
            } else $text = $loginCheck['error'];
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        }
        return $this->show($request, $text); 
    }
}
