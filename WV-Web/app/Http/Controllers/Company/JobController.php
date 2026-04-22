<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Models\User;

class JobController extends Controller
{
private function getCompany() {
    $c = Company::first();
    if (!$c) {
        // Cria usuário se não existir
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@workvale.com',
                'password' => bcrypt('123456')
            ]);
        }
        
        $c = Company::create([
            'user_id' => $user->id,
            'fantasy_name' => 'Empresa Demo',
            'cnpj' => '00.000.000/0001-00',
            'email' => 'demo@workvale.com',
            'status' => 'active',
        ]);
    }
    return $c;
}
    public function index()
    {
        return view('company.jobs.index', ['jobs' => $this->getCompany()->jobs()->withCount('applications')->latest()->paginate(10)]);
    }
    public function create()
    {
        return view('company.jobs.create');
    }
    public function store(Request $r)
    {
        $v = $r->validate(['title' => 'required', 'description' => 'required', 'employment_type' => 'required|in:full-time,part-time,freelance,internship,contract', 'modality' => 'required|in:remote,hybrid,onsite', 'location' => 'nullable', 'salary_min' => 'nullable|numeric|min:0', 'salary_max' => 'nullable|numeric|min:0|gte:salary_min']);
        $job = $this->getCompany()->jobs()->create([...$v, 'status' => 'active', 'published_at' => now()]);
        return redirect()->route('company.jobs.show', $job)->with('success', 'Vaga publicada!');
    }
    public function show(JobPosting $job)
    {
        $job->load('applications.user');
        return view('company.jobs.show', compact('job'));
    }
    public function edit(JobPosting $job)
    {
        return view('company.jobs.edit', compact('job'));
    }
    public function update(Request $r, JobPosting $job)
    {
        $v = $r->validate(['title' => 'required', 'description' => 'required', 'employment_type' => 'required|in:full-time,part-time,freelance,internship,contract', 'modality' => 'required|in:remote,hybrid,onsite', 'location' => 'nullable', 'salary_min' => 'nullable|numeric|min:0', 'salary_max' => 'nullable|numeric|min:0|gte:salary_min']);
        $job->update($v);
        return redirect()->route('company.jobs.show', $job)->with('success', 'Vaga atualizada!');
    }
    public function destroy(JobPosting $job)
    {
        $job->delete();
        return redirect()->route('company.jobs.index')->with('success', 'Vaga excluída!');
    }
}
