<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function paparBorangLogin()
    {
        // return folder bernama resources/views @ atau path yang ditetapkan
        // dalam file config/view.php
        return view('template-login');
    }

    public function authenticate()
    {
        // return redirect('/dashboard');
        return redirect()->route('panel.dashboard');
    }
}
