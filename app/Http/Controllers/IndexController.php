<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    function show(Request $request)
    {
        $sessionUser = $request->session()->get('user');
        if (isset($sessionUser)) {
            return view('index', ['sessionUser' => $sessionUser]);
        } else {
            return view('index');
        }
    }
}
