<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\LoginAuth;
use App\Components\Queries\GetUserbyUsername\GetUserByUsernameQuery;
use App\Components\Queries\GetUserbyUsername\GetUserByUsernameQueryHandler;
use Exception;
use Illuminate\Http\Request;



class LoginController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        $messageNotification = $request->query('status');
        if (isset($sessionUser)) {
            return redirect()->to('/');
        } else return view('login', ['text' => $messageNotification, 'sessionAdmin' => $sessionAdmin]);
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
                $query = new GetUserByUsernameQuery($n_ut_input);
                $result = GetUserByUsernameQueryHandler::Retrieve($query);
                $loginAuth = $login->checkAuthetication($result); 
                if (!$loginAuth)  $text = "Dati errati";
                else {
                    $request->session()->put('user', $n_ut_input);
                    if ($result->getAdmin()) $request->session()->put('admin', 1);
                    return redirect()->to('/profilo');
                }
            } else $text = $loginCheck['error'];
        } catch (Exception $ex) {
            $text = $ex->getMessage();
        }
        return redirect()->action(
            [LoginController::class, 'show'],
            ['status' => $text]
        );
    }
}
