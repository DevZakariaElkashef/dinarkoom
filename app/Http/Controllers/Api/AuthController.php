<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthenticatedResource;
use App\Mail\SendCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\BaseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use BaseTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm'],
            'phone' => ['required', 'digits:8', 'regex:/^[124569]/', 'unique:users'],
            'addition_phone' => ['required', 'different:phone', 'digits:8', 'regex:/^[124569]/', 'unique:users'],
            'civil_id' => ['required', 'digits:12', 'regex:/^[123]/', 'unique:users'],
        ]);

        $validator->setAttributeNames([
            'name' => __("User name"),
            'email' => __('Email Address'),
            'password' => __("Password"),
            'civil_id' =>  __("Civil ID number"),
            'phone' => __("Phone"),
            'addition_phone' => __("Addition_Phone")
        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'addition_phone' => $request->addition_phone,
            'civil_id' => $request->civil_id,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('client');

        return $this->sendResponse('', __("User Created Success, You Can Login Now."));

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|exists:users,email',
            'password' => 'required'

        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            // Passwords do not match
            return $this->sendError(__("validation.current_password"));
        }

        if ($user->is_online) {
            return $this->sendError(__("This user is already online"));
        }

        $user->is_online = 1;
        $user->save();

        $result = new AuthenticatedResource($user);
        return $this->sendResponse($result, '');
        
        
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->is_online = 0;
        $user->save();
        $user->tokens()->delete();

        return $this->sendResponse('', __('user logout successfully'));
    }

    public function sendCode(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|exists:users,email',

        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $code = random_int(1111, 9999);

        $user = User::where('email', $request->email)->first();

        $user->code = $code;
        $user->save();

        Mail::to($request->email)->send(new SendCodeMail($code));

        return $this->sendResponse('', __("Reset Code Has been sent to your email"));
    }

    public function codeCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'code' => 'required|exists:users,code',

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $user = User::where('code', $request->code)->first();

        $token = 'Bearer ' . $user->createToken('MyApp')->plainTextToken ?: '';

        return $this->sendResponse($token, '');
    }


    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'password' => 'required|string|min:8|same:confirm',

        ]);

        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->save();


        return $this->sendResponse('', __("Password Updated Success, You Can Login Now."));

    }
    
}
