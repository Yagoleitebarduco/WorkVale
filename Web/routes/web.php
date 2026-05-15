<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Controller - Inicio
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegisterCompanyController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MuralController;
use App\Http\Controllers\MyJobsController;
use App\Http\Controllers\WalletController;

// Company
use App\Http\Controllers\DashboardController;

// Controller - Fim

// Rota da tela de login
Route::get('/', [LoginController::class, 'shotToLoginScreen'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota para selecionar qual cadastro ira realizar
Route::get('/register', [HomeController::class, 'showToSelectScreen'])->name('selectScreen');

// Rota da tela de cadastro de freelancer
Route::get('/register/user', [RegisterUserController::class, 'showToRegisterUserScreen'])->name('register.user');
Route::post('/register/user', [RegisterUserController::class, 'storeUser']);

// Rota da tela de cadastro de empresas
Route::get('/register/company', [RegisterCompanyController::class, 'showToRegisterCompany'])->name('register.company');
Route::post('/register/company', [RegisterCompanyController::class, 'storeCompany']);

// Rota da tela de perfil
Route::get('/perfil/{name}', [UserController::class, 'showToUserScreen'])->name('user.perfil');


// Rotas Protegidas para os freelancres
Route::middleware('auth:web')->group(function () {
    Route::get('/user/home', [HomeController::class, 'showToHomeScreen'])->name('user.home');

    Route::get('/user/mural', [MuralController::class, 'showToMuralScreen'])->name('user.mural');

    Route::get('/user/myjobs', [MyJobsController::class, 'showToMyJobsScreen'])->name('user.myjobs');

    Route::get('/user/wallet', [WalletController::class, 'showToWalletScreen'])->name('user.wallet');

    // Candidatar-se
    Route::post('/apply/{id}', [WorkController::class, 'apply'])->name('work.apply');
});

// Rotas Protegidas para as empresas
Route::middleware('auth:company')->group(function () {
    Route::get('/company/dashboard', [DashboardController::class, 'showToDashboardScreen'])->name('company.dashboard');

    // Tela de formulario de Criação
    Route::get('/company/newwork', [WorkController::class, 'showToNewWorkScreen'])->name('company.newwork'); 

    Route::get('/company/myjobs', [MyJobsController::class, 'showToMyJobsScreen'])->name('company.myjobs');

    Route::get('/company/wallet', [WalletController::class, 'showToWalletScreen'])->name('company.wallet');

    
    // Rotas para tela de CRUD de trabalhos
    Route::post('/company/newwork', [WorkController::class, 'store']); // Criação de Trabalho
    Route::put('/update/works/{id}', [WorkController::class, 'updateWorks'])->name('work.update'); // Update de Trabalhos
    Route::delete('/work/{id}', [WorkController::class, 'destroy'])->name('works.delete');

    // Rota para contratar um freelancer / efetivo
    Route::patch('/contract/aplicants/{workid}/{id}', [WorkController::class, 'acceptApplicant'])->name('work.accept');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showToAdminDashboardScreen'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'showToAdminUsersScreen'])->name('admin.users');
});
