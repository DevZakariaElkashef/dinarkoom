<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\TextPage;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    public function aboutUs()
    {
        $column = 'content_' . app()->getLocale();
        $content = TextPage::where('type', 0)->first()->$column;

        return view('site.text_pages.about', compact('content'));
    }
   
    public function terms()
    {
        $column = 'content_' . app()->getLocale();
        $content = TextPage::where('type', 1)->first()->$column;

        return view('site.text_pages.terms', compact('content'));
    }


}
