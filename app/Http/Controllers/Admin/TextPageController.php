<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TextPage;
use Illuminate\Http\Request;

class TextPageController extends Controller
{
    public function aboutIndex()
    {
        $about = TextPage::where('type', 0)->first();
        return view('dashboard.pages.about', compact('about'));
    }

    public function aboutStore(Request $request)
    {
        $data = $request->except('_token');
        $data['type'] = 0;
        $page = TextPage::where('type', 0)->first();

        if ($page == null) {
            TextPage::create($data);
        } else {
            $page->update($data);
        }


        return back()->with('message', __('Created_Successfuly'));
    }
    
    public function termsIndex()
    {
        $terms = TextPage::where('type', 1)->first();
        return view('dashboard.pages.terms', compact('terms'));
    }

    public function termsStore(Request $request)
    {
        $data = $request->except('_token');
        $data['type'] = 1;
        $page = TextPage::where('type', 1)->first();

        if ($page == null) {
            TextPage::create($data);
        } else {
            $page->update($data);
        }

        return back()->with('message', __('Created_Successfuly'));
    }
}
