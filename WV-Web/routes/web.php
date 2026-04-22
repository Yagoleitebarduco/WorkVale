<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Company\CompanyRegisterController;

Route::get('/', fn() => view('Screens.select'));
Route::get('/register/freelancer', fn() => view('Screens.Auth.Register.RegisterFreelancers'));


Route::get('/register/company', [CompanyRegisterController::class, 'show'])->name('register.company');
Route::post('/register/company', [CompanyRegisterController::class, 'store']);

Route::prefix('company')->name('company.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('jobs', JobController::class);
});

Route::get('/test-view', fn() => view('company.test'));