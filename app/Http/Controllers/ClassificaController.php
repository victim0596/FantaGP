<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassificaController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        return view('classifica', [
            'sessionAdmin' => $sessionAdmin,
            'sessionUser' => $sessionUser,
        ]);
    }
}
