<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('screens.screenSelector');
});

Route::get('/RegisterEmpress', function () {
    return view('auth.register.empressRegister');
})->name('screenRegister');
