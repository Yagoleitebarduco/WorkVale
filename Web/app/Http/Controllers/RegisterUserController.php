<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

// Models
use App\Models\Skill;
use App\Models\City;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function showToRegisterUserScreen() {
        $skills = Skill::all();
        $cities = City::all();

        return view('Auth.Register.RegisterUser', compact('skills', 'cities'));
    }

    public function storeUser(Request $request) {
        // dd($request->all());

        $date_min = Carbon::now()->subYear(18)->format('Y-m-d');

        // $data = $request->all();
        // $data['complete_name'] = Str::slug($request->complete_name);

        $request->validate(
            [
                'cpf' => [
                    'required',
                    'unique:users,cpf',
                    'unique:companies,cpf_cnpj'
                ],
                'birth_date' => [
                    'required',
                    'date',
                    'before_or_equal:' . $date_min
                ],
                'phone_number' => [
                    'required',
                    'unique:users,phone_number',
                    'unique:companies,phone_number'
                ],
                'email' => [
                    'required',
                    'unique:users,email',
                    'unique:companies,email'
                ],

                'skills' => 'nullable|array',
                'skills*id' => 'exists:skills,id',
            ],
            [
                'cpf.unique' => 'O CPF informado já está em uso.',
                'birth_date.before_or_equal' => 'Você deve ser maior de 18 anos para se cadastrar.',
                'phone_number.unique' => 'O número de telefone informado já está em uso.',
                'email.unique' => 'O endereço de email informado já está em uso.',
            ]
        );

        $user = User::create($request->all());
        
        $user->skill()->sync($request->skills);

        return redirect()->route('login');
    }
}
