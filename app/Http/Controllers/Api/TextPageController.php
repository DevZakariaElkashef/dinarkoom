<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\BaseTrait;
use App\Models\TextPage;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    use BaseTrait;

    public function aboutUs()
    {
        $aboutUs = TextPage::where('type', 0)->first()->{'content_' . app()->getLocale()} ?? '';
        
        return $this->sendResponse($aboutUs, '');
    }
    
    
    public function terms()
    {
        $terms = TextPage::where('type', 1)->first()->{'content_' . app()->getLocale()} ?? '';
        
        return $this->sendResponse($terms, '');
    }
}
