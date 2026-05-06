<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Work;



class WorkController extends Controller
{
    public function apply($workId) {
        $userId = Auth::id();

        $applicants = User::applicants();

        $applicants->sync($userId, $workId);
    }
}
