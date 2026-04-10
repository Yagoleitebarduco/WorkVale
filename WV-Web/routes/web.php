<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('Screens.select');
});

Route::get('/registerFreelancer', function () {
    return view('Auth.Register.freelancer');
})->name('registerFreelancer');

Route::get('/RegisterEmpress', function () {
    return view ('Scree')
))
