<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class LanguageSwitchController extends Controller
{
   
    public function languageSwitch($local)
    {

        Session::put('changed_language', $local);
        return back();
    }
}
