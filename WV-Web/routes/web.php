<?php

use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('Screens.select');
});

Route::get('/register/freelancer', function () {
    return view('Screens.Auth.Register.RegisterFreelancers');
});











// rota apenas para visualizaçao de telas ass:pixula
Route::get('/visualizar', function () {
    return view('Screens.Home.Mural');
});