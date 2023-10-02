<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Order;
use App\Models\Relative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function checkout()
    {
        if (!Auth::check() && !auth('guest')->check()) {

            return to_route('guest.register');
        }

        // payment gateway

        
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'civil_id' => 'required'
        ]);
        

        if ($validator->fails()) {
            session()->flash('message', __("Faild_to_order!"));
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Image::online()->first() == null) {
            return back()->with('message', 'we do not have images this month');
        }

        $userId = $request->user()->id ?? auth('guest')->user()->id;
        $check = Order::where('user_id', $userId)->where('image_id', Image::online()->first()->id)->first();

        if ($check) {
            return back()->with('message', 'you can not buy this month');
        }


        if (auth('guest')->check()) {
            Order::create([
                'user_id' => auth('guest')->user()->id,
                'image_id' => Image::online()->first()->id,
                'date' => now(),
                'invoice_id' => '123413241234'
            ]);

        } else {

            if ($request->user()->civil_id == $request->civil_id) {
                
                Order::create([
                    'user_id' => $request->user()->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234'
                ]);

            } else {

                Order::create([
                    'user_id' => $request->user()->id,
                    'relative_id' => Relative::where('civil_id', $request->civil_id)->first()->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234'
                ]);
            }

        }

        return back()->with('message', 'you have ordered succefully!');
        
    }
}
