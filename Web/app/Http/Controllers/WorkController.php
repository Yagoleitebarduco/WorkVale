<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

// Models
use App\Models\Skill;
use App\Models\Company;
use App\Models\User;
use App\Models\Work;



class WorkController extends Controller
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

        $data['company_id'] = Auth::guard('company')->id();

        $work = Work::create($data);

        $work->skills()->sync($request->skills);

        return redirect()->route('company.dashboard');
    }

    public function updateWorks(Request $request, $id)
    {
        $work = Work::findOrFail($id);

        $work->update($request->only([
            'name_work',
            'description_work',
            'type_work',
            'start_date',
            'end_date',
            'duration',
            'payment'
        ]));

        if ($request->has('skills')) {
            $work->skills()->sync($request->skills);
        } else {
            $work->skills()->detach();
        }

        return back()->with('success', 'Atualização Concluida');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        if ($work->companies_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para excluir este trabalho.');
            return back()->with('error', 'Não foi possível excluir este item.');
        }

        $work->delete();

        return back()->with('success', 'Trabalho removido com sucesso!');
    }


    // Candidatar-se
    public function apply($id)
    {
        $user = Auth::user();
        $work = Work::findOrFail($id);

        $user->appliedWorks()->toggle($work->id);

        return back()->with('success', 'Sua candidatura foi processada com sucesso!');
    }

    // Aceitar um freelancer
    public function acceptApplicant($workId, $userId) {
        $work = Work::findOrFail($workId);

        if ($work->companies_id !== Auth::id()) abort(403);

        $work->applicants()->update(['accept' => 0]);
        $work->applicants()->updateExistingPivot($userId, [ 'accept' => 1]);

        $appliacntAccept = $work->applicants()->wherePivot('accept', 1)->count();

        if ($appliacntAccept === 1) {
            $work->update([
                'status' => 2
            ]);
        }

        return back()->with('success', 'Freelancer Contratado');
    }
}
