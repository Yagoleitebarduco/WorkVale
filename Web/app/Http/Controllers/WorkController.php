<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Work;



class WorkController extends Controller
{
    public function apply($workId)
    {
        $userId = Auth::id();

        $applicants = User::applicants();

        $applicants->sync($userId, $workId);
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
}
