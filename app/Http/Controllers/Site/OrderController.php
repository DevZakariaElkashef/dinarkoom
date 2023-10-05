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
use Illuminate\Support\Str;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = $request->user()->orders;

        return view('site.orders.index', compact('orders'));
        
    }

    public function store(Request $request)
    {
        if(auth('guest')->check()) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|exists:users,email',
                'phone' => 'required|exists:users,phone',
                'addition_phone' => 'required|exists:users,addition_phone',
                'civil_id' => 'required|exists:users,civil_id',
            ]);
            
            if ($validator->fails()) {
                session()->flash('message', __("Faild_to_order!"));
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } else {

            
            $validator = Validator::make($request->all(), [
                'civil_id' => 'required'
            ]);
            
            if ($validator->fails()) {
                session()->flash('message', __("Faild_to_order!"));
                return Redirect::back()->withErrors($validator)->withInput();
            }
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
                'invoice_id' => '123413241234',
                'code' => $this->generateOrderCode()
            ]);

        } else {

            if ($request->user()->civil_id == $request->civil_id) {
                
                Order::create([
                    'user_id' => $request->user()->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);

            } else {

                Order::create([
                    'user_id' => $request->user()->id,
                    'relative_id' => Relative::where('civil_id', $request->civil_id)->first()->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);
            }

        }

        return back()->with('message', 'you have ordered succefully!');
        
    }

    public function generateOrderCode()
{
    $year = now()->year;
    $month = now()->month;
    
    // Get the last order code for the current month
    $lastOrder = Order::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->orderBy('id', 'desc')
        ->first();
    
    $increment = $lastOrder ? (int) Str::afterLast($lastOrder->code, '-') + 1 : 0;
    
    return $year . '' . $month . '' . $increment;
}
}
