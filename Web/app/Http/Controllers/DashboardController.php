<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Work;

class DashboardController extends Controller
{
    public function showToDashboardScreen() {
        $works = Work::all();

        return view('Home.Company.Dashboard', compact('works'));
    }
}
