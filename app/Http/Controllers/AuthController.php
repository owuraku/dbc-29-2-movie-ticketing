<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function getLoginForm() {
        return view('auth.login');
    }

    function getRegisterForm() {
        return view('auth.register');
        
    }
}
