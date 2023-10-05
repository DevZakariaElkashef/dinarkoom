<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Order;
use App\Models\TextPage;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    public function aboutUs()
    {
        
        $content = TextPage::where('type', 0)->first() ? TextPage::where('type', 0)->first()->{'content_' . app()->getLocale()} : null;

        return view('site.text_pages.about', compact('content'));
    }
   
    public function terms()
    {
        $column = 'content_' . app()->getLocale();
        $content = TextPage::where('type', 1)->first() ? TextPage::where('type', 1)->first()->{'content_' . app()->getLocale()} : null;
        
        $image = Image::online()->first();
        
        if (auth()->check()) {
            $orderedThisMonth = Order::where('user_id', auth()->user()->id)->where('image_id', $image->id)->exists();
        } elseif(auth('guest')->check()) {
            $orderedThisMonth = Order::where('user_id', auth('guest')->user()->id)->where('image_id', $image->id)->exists();
        } else {
            $orderedThisMonth = false;
        }

        return view('site.text_pages.terms', compact('content', 'orderedThisMonth'));
    }


}
