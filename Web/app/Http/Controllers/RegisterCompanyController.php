<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\AreaActivy;
use App\Models\City;
use App\Models\Company;

class RegisterCompanyController extends Controller
{
    public function showToRegisterCompany()
    {
        $areas = AreaActivy::all();
        $cities = City::all();

        return view('Auth.Register.RegisterCompany', compact('areas', 'cities'));
    }

    public function storeCompany(Request $request)
    {
        $request->validate(
            [
                'cpf_cnpj' => [
                    'required',
                    'unique:users,cpf',
                    'unique:companies,cpf_cnpj'
                ],
                'email' => [
                    'required',
                    'unique:users,email',
                    'unique:companies,email'
                ],
                'phone_number' => [
                    'required',
                    'unique:users,phone_number',
                    'unique:companies,phone_number'
                ]
            ],
            [
                'cpf_cnpj.unique' => 'Já existe um usuario com este Cpf ou Cnpj',
                'phone_number.unique' => 'Já existe um usuario com este numero',
                'email.unique' => 'Já existe um usuario com este email',
            ]
        );

        $company = Company::create($request->all());

        return redirect()->route('login');
    }
}
