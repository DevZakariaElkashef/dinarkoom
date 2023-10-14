<?php

namespace App\Http\Traits;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait BaseTrait
{
    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function sendResponse($result, $message)

    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $lastActivity = $user->last_activity;
            
            $datetime2 = Carbon::now();
            $datetime1 = Carbon::parse($lastActivity);

            $diffInMinutes = $datetime1->diffInMinutes($datetime2);
            // dd($user->id, $datetime2, $datetime1);

            if ($diffInMinutes > Setting::first()->logout_time ?? config('session.lifetime')) {
                $canLogin = false; // Difference is more than a minute
            } else {

                $canLogin = true; // Difference is equal to or less than a minute
                $user->last_activity = now();
                $user->save();
            }


        } else {
            $canLogin = true;
        }

        $response = [

            'status' => true,

            'data'    => $result,

            'message' => $message,

            'login' => $canLogin,

        ];

        

        return response()->json($response, 200);
    }



    /**
 
     * return error response.
 
     *
 
     * @return \Illuminate\Http\Response
 
     */

    public function sendError($error, $code = 404)

    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $lastActivity = $user->last_activity;
            
            $datetime2 = Carbon::now();
            $datetime1 = Carbon::parse($lastActivity);

            $diffInMinutes = $datetime1->diffInMinutes($datetime2);
            // dd($user->id, $datetime2, $datetime1);

            if ($diffInMinutes > Setting::first()->logout_time ?? config('session.lifetime')) {
                $canLogin = false; // Difference is more than a minute
            } else {

                $canLogin = true; // Difference is equal to or less than a minute
                $user->last_activity = now();
                $user->save();
            }


        } else {
            $canLogin = true;
        }

        $response = [

            'status' => false,

            'data' => "",
            
            'message' => $error,

            'login' => $canLogin,
        ];


        return response()->json($response, $code);
    }
}
