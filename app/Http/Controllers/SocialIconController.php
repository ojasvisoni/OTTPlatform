<?php

namespace App\Http\Controllers;

use App\SocialIcon;
use Illuminate\Http\Request;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class SocialIconController extends Controller
{

    public function get()
    {
        $si = SocialIcon::first();
        return view('admin.landing-page.si', compact('si'));
    }

    public function post(Request $request)
    {
        if (env('DEMO_LOCK') == 1) {
            return back()->with('deleted', __('This action is disabled in the demo !'));
        }
        $si = SocialIcon::first();

        $input = $request->all();

        $si->update($input);
        return back()->with('updated', __('Social Icon url has been updated !'));
    }
}
