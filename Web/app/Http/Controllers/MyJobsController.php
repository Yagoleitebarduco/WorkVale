<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// model
use App\Models\Work;
use App\Models\Skill;

class MyJobsController extends Controller
{
    public function showToMyJobsScreen()
    {
        $userId = Auth::id();

        if (Auth()->guard('web')->check()) {
            return view('Home.User.MyJobs');
        }


        // Comapny
        $works = Work::where('company_id', $userId)->with('skills')->withCount('applicants')->get();

        $allSkills = Skill::all();

        if (Auth()->guard('company')->check()) {
            return view('Home.Company.MyJobs', compact('works', 'allSkills'));
        }
    }
}
