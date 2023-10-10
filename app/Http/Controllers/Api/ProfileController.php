<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ViewProfileResourece;
use App\Http\Traits\BaseTrait;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    use BaseTrait;

    public function index(Request $request)
    {
        $user = $request->user();

        $result = new ViewProfileResourece($user);

        return $this->sendResponse($result, '');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $uniqueRule = Rule::unique('users')->ignore($user->id);

        $validator = Validator::make($request->all(), [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', $uniqueRule],
            'civil_id' => ['required', $uniqueRule],
            'phone' => ['required', 'string', 'max:255', $uniqueRule],
            'addition_phone' => ['required', 'string', 'max:255', $uniqueRule],

        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }


        $user->update($request->all());
        

        return $this->sendResponse('', __('Your Profile Updated Successfully.'));
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [

            'old_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|string|min:8|same:confirm',

        ]);


        if ($validator->fails()) {

            return $this->sendError($validator->errors()->first(), 403);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return $this->sendResponse('', __("Password Updated Successfully"));
    }
}
