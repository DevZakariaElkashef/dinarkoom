<?php

namespace App\Http\Traits;

trait BaseTrait
{
    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function sendResponse($result, $message)

    {

        $response = [

            'status' => true,

            'data'    => $result,

            'message' => $message,

            'login' => true,

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

        $response = [

            'status' => false,

            'data' => "",
            
            'message' => $error,

            'login' => true,
        ];


        return response()->json($response, $code);
    }
}
