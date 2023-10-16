<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewOrdersResourece;
use App\Http\Traits\BaseTrait;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    use BaseTrait;

    public function index(Request $request)
    {
        $user = $request->user();

        $result = ViewOrdersResourece::collection($user->orders);

        $message = $user->orders->count() < 1 ? __("No Orders Yet") : "";

        return $this->sendResponse($result, $message);
    }

    public function store(Request $request)
    {
        $user = $request->user('sanctum');

        if ($user) {
            
            $check = Order::where('user_id', $user->id)->where('image_id', Image::online()->first()->id)->first();

            if ($check) {
                return $this->sendError(__("you can not buy this month"), 403);
            }


            // check if user will buy for him self or relatives
            $validator = Validator::make($request->all(), [
                'beneficiary' => 'required|in:0,1',
                'relative_id' => 'nullable|exists:relatives,id'
            ]);
    
            if ($validator->fails()) {
    
                return $this->sendError($validator->errors()->first(), 403);
            }

            if ($request->beneficiary == 1 && $request->relative_id) { // user buy for relative

                $order = Order::create([
                    'user_id' => $user->id,
                    'relative_id' => $request->relative_id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);

            } else { // user buy for hemself

                $order = Order::create([
                    'user_id' => $user->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);

            }

        } else {
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'civil_id' => 'required|string',
                'phone' => 'required|string',
                'addition_phone' => 'required|string',
            ]);
    
            if ($validator->fails()) {
    
                return $this->sendError($validator->errors()->first(), 403);
            }

            $guest = User::where('email', $request->email)
                    ->orWhere('phone', $request->phone)
                    ->orWhere('addition_phone', $request->addition_phone)
                    ->orWhere('civil_id', $request->civil_id)
                    ->get();

            if ($guest->count() > 1) {
                return $this->sendError(__("This data does not match"), 403);
            }

            $guest = $guest->first();

            if ($guest) {

                $check = Order::where('user_id', $guest->id)->where('image_id', Image::online()->first()->id)->first();

                if ($check) {
                    return $this->sendError(__("you can not buy this month"));
                }

                // create order
                $order = Order::create([
                    'user_id' => $guest->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);

                
            } else {
                $guest = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'civil_id' => $request->civil_id,
                    'phone' => $request->phone,
                    'addition_phone' => $request->addition_phone,
                    'is_guest' => true, // Set the user as a guest
                    'role' => 3
                ]);

                $guest->assignRole('guest');


                // create order
                $order = Order::create([
                    'user_id' => $guest->id,
                    'image_id' => Image::online()->first()->id,
                    'date' => now(),
                    'invoice_id' => '123413241234',
                    'code' => $this->generateOrderCode()
                ]);
            }
            
        }


        return $this->sendResponse(new ViewOrdersResourece($order), __("You have ordered successfully!"));
    }


    private function generateOrderCode()
    {
        $year = now()->year;
        $month = now()->month;
        $day = now()->day;
        
        // Get the last order code for the current month
        $lastOrder = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->first();
        
        if ($lastOrder && $lastOrder->created_at->format('Y-m') === now()->format('Y-m')) {
            $increment = (int) Str::afterLast($lastOrder->code, '-') + 1;
        } else {
            $increment = 1;
        }
        
        return $year . sprintf('%02d', $month) . sprintf('%02d', $day) . '-' . sprintf('%04d', $increment);
    }
}
