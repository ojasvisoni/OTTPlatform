<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class emailSubscribe extends Controller
{
   

    public function subscribe(Request $request)
    {
        $check = Newsletter::isSubscribed($request->email);

        if ($check == 1) {

            return back()->with('updated', __('Your email already has been subscribed'));

        } else {

            $subscribe_email = Newsletter::subscribe($request->email);

            if (isset($subscribe_email)) {
                return back()->with('added', __('Email has been subscribe successfully'));
            } else {
                return back()->with('deleted', __('Please check your email'));
            }

        }

    }

}
