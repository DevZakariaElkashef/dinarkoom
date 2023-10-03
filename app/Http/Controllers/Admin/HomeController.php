<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        session()->flash('message', __("welcome back!"));
        $users = User::all()->count();
        $messages = ContactUs::whereNull('replay_id')->count();
        $orders = Order::all()->count();
        return view('dashboard.index', compact('users', 'messages', 'orders'));
    }
}
