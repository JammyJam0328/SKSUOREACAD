<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPages extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function users()
    {
        return view('pages.admin.user');

        
    }
    public function documents()
    {
        return view('pages.admin.document');

    }
}