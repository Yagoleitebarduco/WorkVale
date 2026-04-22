<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyRegisterController extends Controller
{
    public function show()
    {
        return view('company.register');
    }
    public function store(Request $r)
    {
        $v = $r->validate([
            'fantasy_name' => 'required',
            'cnpj' => 'required|unique:companies,cnpj',
            'industry' => 'required',
            'responsible_name' => 'required',
            'email' => 'required|email|unique:companies,email|unique:users,email',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'description' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create(['name' => $v['responsible_name'], 'email' => $v['email'], 'password' => Hash::make($v['password'])]);
        Company::create(['user_id' => $user->id, 'fantasy_name' => $v['fantasy_name'], 'cnpj' => $v['cnpj'], 'email' => $v['email'], 'phone' => $v['phone'], 'industry' => $v['industry'], 'description' => $v['description'], 'city' => $v['city'], 'address' => $v['address'], 'status' => 'active']);
        return response()->json(['success' => true, 'redirect' => route('company.dashboard')]);
    }

    
}


