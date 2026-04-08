<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Screens.select');
});

Route::get('/registerFreelancer', function () {
    return view('Auth.Register.freelancer');
})->name('registerFreelancer');
