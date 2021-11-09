<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class sessionUserValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        

        $response = $next($request);

        $session = $request->session()->get('user');
        if(!isset($session)) return redirect('/');

        return $response;
    }
}
