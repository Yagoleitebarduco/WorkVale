<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showToUserScreen($name)
    {
        $user = User::all()->first(function ($user) use ($name) {
            return Str::slug($user->complete_name) == $name;
        });

        if (!$user) {
            abort(404);
        }

        $user->load('skills');

        return view('Admin.user', compact('user'));
    }
}
