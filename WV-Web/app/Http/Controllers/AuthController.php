<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\Skils;
use App\Models\City;

class AuthController extends Controller
{
    public function showLoginScreen()
    {
        return view('Screens.Auth.Login.Login');
    }

    public function showRegisterFreelancerScreen()
    {
        $cities = City::all();
        $skils = Skils::all();

        return view('Screens.Auth.Register.RegisterFreelancers', compact('cities', 'skils'));
    }

    public function showRegisterEmpressScreen()
    {
        return view('Screens.Auth.Register.RegisterEmpresa');
    }


    // Freelancers
    public function registerFreelancer(Request $request)
    {
        
    }
}
