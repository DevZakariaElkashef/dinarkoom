<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\BaseTrait;
use App\Mail\ContactReplay;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    use BaseTrait;

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|min:8|'
        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }


        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        Mail::to($request->email)->send(new ContactReplay($request->name));

        return $this->sendResponse('', __('Your Message Sent Successfully'));
    }
}
