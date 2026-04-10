<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginScreen()
    {
        return view('Screens.Auth.Login.Login');
    }

    public function showRegisterFreelancerScreen()
    {
        return view('Screens.Auth.Register.RegisterFreelancers');
    }
}
