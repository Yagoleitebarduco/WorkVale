<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showToWalletScreen() {
        return view('Home.User.Wallet');
    }
}
