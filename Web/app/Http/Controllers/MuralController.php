<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Work;

class MuralController extends Controller
{
    public function showToMuralScreen() {
        $works = Work::with(['company', 'skills'])->get();
        return view('Home.User.Mural', compact('works'));
    }
}
