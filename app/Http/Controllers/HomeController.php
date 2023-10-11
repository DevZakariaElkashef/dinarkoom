<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Image;
use App\Models\Order;
use App\Models\Banner;
use Carbon\Carbon;

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
        $rightImage = Banner::where('dir', 0)->first() ? Banner::where('dir', 0)->first() : null;
        $leftImage = Banner::where('dir', 1)->first() ? Banner::where('dir', 1)->first() : null;
        $image = Image::online()->first();
        $buyers = Order::where('image_id', $image->id)->count();
        $sales = $buyers * $image->price;
        
        if(auth()->check()) {
            $canDownload = Order::where('image_id', $image->id)->where('user_id', auth()->user()->id)->exists();
        } elseif(auth('guest')->check()) {
            $canDownload = Order::where('image_id', $image->id)->where('user_id', auth('guest')->user()->id)->exists();
        } else {
            $canDownload = false;
        }
        
        
        if (auth()->check()) {
            $orderedThisMonth = Order::where('user_id', auth()->user()->id)->where('image_id', $image->id)->exists();
        } elseif(auth('guest')->check()) {
            $orderedThisMonth = Order::where('user_id', auth('guest')->user()->id)->where('image_id', $image->id)->exists();
        } else {
            $orderedThisMonth = false;
        }

        $auction = Auction::where('month', 10)
                ->whereYear('created_at', Carbon::now()->year)
                ->first();

        $auction = $auction ? $auction->value : 0;


        

        

        return view('site.index', compact('rightImage', 'leftImage', 'image', 'buyers', 'sales', 'orderedThisMonth', 'canDownload', 'auction'));
    }
}
