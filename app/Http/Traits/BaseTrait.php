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

            'success' => true,

            'data'    => $result,

            'message' => $message,

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

            'success' => false,

            'data' => "",
            
            'message' => $error,
        ];


        return response()->json($response, $code);
    }
}
