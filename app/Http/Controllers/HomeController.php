<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rightImage = Banner::where('dir', 0)->first() ? Banner::where('dir', 0)->first()->image : null;
        $leftImage = Banner::where('dir', 1)->first() ? Banner::where('dir', 1)->first()->image : null;

        return view('site.index', compact('rightImage', 'leftImage'));
    }
}
