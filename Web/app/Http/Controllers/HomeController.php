<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Work;

class HomeController extends Controller
{
    public function showToSelectScreen() {
        return view('Auth.SelectScreen');
    }

    public function showToHomeScreen() {
        $works = Work::with('company')->get();
        
        return view('Home.User.Home', compact('works'));
    }
}
