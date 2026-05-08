<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Work;

class DashboardController extends Controller
{
    public function showToDashboardScreen() {
        $userId = Auth::id();

        $works = Work::where('companies_id', $userId)->with('skills')->get();

        $allSkills = Skill::all();

        return view('Home.Company.Dashboard', compact('works', 'allSkills'));
    }
}
