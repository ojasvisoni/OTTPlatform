<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\SitemapGenerator;

/*==========================================
    =            Author: Media City            =
    Author URI: https://mediacity.co.in
    =            Author: Media City            =
    =            Copyright (c) 2022            =
    ==========================================*/
class SiteMapController extends Controller
{
    public function sitemapGenerator(){

        SitemapGenerator::create(url('/'))->writeToFile('sitemap.xml');
        return back()->with('added','Sitemap generated successfully !');

    }

    public function download(){


        return response()->download(public_path('/sitemap.xml'));


    }
}
