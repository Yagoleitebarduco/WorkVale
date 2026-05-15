<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company;

class AdminController extends Controller
{
    public function showToAdminDashboardScreen() {
        return view('Admin.Dashboard');
    }

    public function showToAdminUsersScreen() {
        $users = User::all();
        $comapnies = Company::all();

        return view('Admin.Users', compact('users', 'comapnies'));
    }
}
