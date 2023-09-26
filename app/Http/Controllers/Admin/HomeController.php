<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        session()->flash('message', __("welcome back!"));
        return view('dashboard.index');
    }
}
