<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class CurrencySwitchController extends Controller
{
    public function index($currency){
        Session::put('current_currency', $currency);
        return back();
    }
    
}
