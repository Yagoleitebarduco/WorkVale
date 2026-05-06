<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Skill;
use App\Models\Company;
use App\Models\Work;

class NewWorkController extends Controller
{
    public function showToNewWorkScreen()
    {
        $skills = Skill::all();

        return view('Home.Company.NewWork', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'start_date' => [
                    'required',
                    'date',
                ],
                'end_date' => [
                    'required',
                    'date',
                    'after_or_equal:start_date',
                ],
                'duration' => [
                    'required',
                    'integer',
                    'min:3'
                ],
                'type_work' => [
                    'required'
                ]
            ],
            [
                'end_date.after_or_equal' => 'A data final deve ser maior que a data inicial',
                'duration.min' => 'Deve Ter pelo menos 3 dias de duração',
                'type_work.required' => 'Seleciona qual o tipo de trabalho'
            ]
        );

        $data = $request->all();

        $data['companies_id'] = Auth::guard('company')->id();

        $work = Work::create($data);

        $work->skills()->sync($request->skills);
        
        return redirect()->route('company.dashboard');
    }
}
