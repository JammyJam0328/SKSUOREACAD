<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Registrar
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
        if(!Auth()->user()){
            return redirect()->route('login');
        }
        if(Auth()->user()->role=="registrar"){
            return $next($request);
        }else{
           return redirect()->back();
         }
    }
}