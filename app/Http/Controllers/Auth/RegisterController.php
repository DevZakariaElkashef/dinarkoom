<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *  6-5-9-4 (8) - 2-1 (8)
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) 
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
            'civil_id' => ['required', 'digits:12', 'regex:/^[123]/', 'unique:users'],
            'phone' => ['required', 'digits:8', 'regex:/^[124569]/', 'unique:users'],
            'addition_phone' => ['required', 'different:phone', 'digits:8', 'regex:/^[124569]/', 'unique:users'],
        ]);

        $validator->setAttributeNames([
            'name' => __("User name"),
            'email' => __('Email Address'),
            'password' => __("Password"),
            'civil_id' =>  __("Civil ID number"),
            'phone' => __("Phone"),
            'addition_phone' => __("Addition_Phone")
        ]);


        return $validator;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'civil_id' => $data['civil_id'],
            'phone' => $data['phone'],
            'addition_phone' => $data['addition_phone'],
        ]);

        $user->assignRole('client');

        return $user;
    }
}
