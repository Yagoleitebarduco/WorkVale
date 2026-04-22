<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index()
    {
        $company = Company::first();
        if (!$company) return view('company.dashboard', ['activeJobs' => 0, 'totalCandidates' => 0, 'interviewsCount' => 0, 'recentJobs' => collect()]);
        return view('company.dashboard', [
            'activeJobs' => $company->jobs()->where('status', 'active')->count(),
            'totalCandidates' => $company->jobs()->withCount('applications')->sum('applications_count'),
            'interviewsCount' => $company->jobs()->whereHas('applications', fn($q) => $q->where('stage', 'interview'))->count(),
            'recentJobs' => $company->jobs()->withCount('applications')->latest()->take(5)->get()
        ]);
    }
}
