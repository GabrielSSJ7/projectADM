<?php

namespace App\Http\Middleware;

use App\Adm;
use Closure;
use Illuminate\Support\Facades\DB;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $credentials = $request->only('email', 'password');
        //print_r($credentials);

        if (Auth::guard('custom')->attempt($credentials)){
            return redirect()->intended('/dashboard');
        }

        return $next($request);
    }
}
