<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectUser extends Controller
{

    public function index()
    {
        if(auth()->user()->role=="registrar")
        {
                return redirect()->route('registrar-dashboard');
        };
    
        if(auth()->user()->role=="admin")
        {
                return redirect()->route('admin-dashboard');
        }
    
        if(auth()->user()->role=="requestor")
        {
               return redirect()->route('requestor-dashboard');
        };
    }

}