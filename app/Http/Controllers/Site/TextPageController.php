<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    public function aboutUs()
    {
        return view('site.text_pages.about');
    }
   
    public function terms()
    {
        return view('site.text_pages.terms');
    }


}
