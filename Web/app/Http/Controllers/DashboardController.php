<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Work;
class DashboardController extends Controller
{
    public function showToDashboardScreen() {
        $userId = Auth::id();
        
        $works = Work::where('company_id', $userId)->with('skills')->withCount('applicants')->get();

        $allSkills = Skill::all();

        return view('Home.Company.Dashboard', compact('works', 'allSkills'));
    }
}
