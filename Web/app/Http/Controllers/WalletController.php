<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showToWalletScreen()
    {
        if (Auth()->guard('web')->check()) {
            return view('Home.User.Wallet');
        } elseif (Auth()->guard('company')->check()) {
            return view('Home.Company.Wallet');
        }
    }
}
