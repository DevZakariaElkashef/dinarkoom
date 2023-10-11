<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        session()->flash('message', __("Welcome Back!"));
        
        $usersMonth = User::whereMonth('created_at', date('m'))->count();
        $messagesMonth = ContactUs::whereMonth('created_at', date('m'))->count();
        $ordersMonth = Order::whereMonth('created_at', date('m'))->count();
        
        
        $users = User::all()->count();
        $messages = ContactUs::whereNull('replay_id')->count();
        $orders = Order::all()->count();
        
        $currentMonth = Carbon::now()->month;
        $auction = Auction::where('month', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->first();

        $discountValue = Setting::first()->site_discount ?? 0;
        

        return view('dashboard.index', compact('users', 'messages', 'orders', 'ordersMonth', 'messagesMonth', 'usersMonth', 'auction', 'discountValue'));
    }
}
