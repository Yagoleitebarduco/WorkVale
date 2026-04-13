<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

// Controllers
use App\Http\Controllers\AuthController;

// Routes
Route::get('/', [AuthController::class, 'showLoginScreen'])->name('login');

Route::get('/register/Freelancer', [AuthController::class, 'showRegisterFreelancerScreen'])->name('register.freelancer');