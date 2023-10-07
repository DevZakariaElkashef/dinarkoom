<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthenticatedResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\BaseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use BaseTrait;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'addition_phone' => 'required|unique:users,addition_phone',
            'civil_id' => 'required|unique:users,civil_id',
            'password' => 'required|min:8|same:confirm'

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
        ]);


        $user->assignRole('client');

        // mobark: is the user will login in after register
        // $user->is_online = 1;
        // $user->save();

        $result = new AuthenticatedResource($user);

        return $this->sendResponse($result, '');

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
        
        
    }
}
