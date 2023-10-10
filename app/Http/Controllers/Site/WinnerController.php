<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index()
    {
        $winners = Winner::with('user')->latest('status')->paginate(100);
        return view('site.winners.index', compact('winners'));
    }
}
