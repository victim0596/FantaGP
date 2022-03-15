<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StatisticheController extends Controller
{

    function show(Request $request)
    {
        $sessionAdmin = $request->session()->get('admin');
        $sessionUser = $request->session()->get('user');
        if (isset($sessionUser)) {
            return view('statistiche', ['sessionUser' => $sessionUser, 'sessionAdmin' => $sessionAdmin]);
        } else {
            return view('statistiche');
        }
    }
}
