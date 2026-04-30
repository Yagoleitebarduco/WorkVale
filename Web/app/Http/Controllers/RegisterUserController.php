<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Skill;
use App\Models\City;

class RegisterUserController extends Controller
{
    public function showToRegisterUserScreen() {
        $skills = Skill::all();
        $cities = City::all();

        return view('Auth.Register.RegisterUser', compact('skills', 'cities'));
    }
}
