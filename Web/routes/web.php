<?php

use Illuminate\Support\Facades\Route;

// Controller - Inicio
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;

use App\Http\Controllers\HomeController;
// Controller - Fim

// Rota da tela de login
Route::get('/', [LoginController::class, 'shotToLoginScreen'])->name('login');

// Rota para selecionar qual cadastro ira realizar
Route::get('/register', [HomeController::class, 'showToSelectScreen'])->name('selectScreen');

// Rota da tela de cadastro de freelancer
Route::get('/register/user', [RegisterUserController::class, 'showToRegisterUserScreen'])->name('register.user');
