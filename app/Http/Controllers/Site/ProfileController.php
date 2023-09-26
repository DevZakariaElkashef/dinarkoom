<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('site.profile.index');
    }
    
    public function editPassword()
    {
        return view('site.profile.password');
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update($request->all());

        return back()->with('message', __('Your Profile Updated Successfully.'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update(['password' => Hash::make($request->new_password)]);

        return back()->with('message', __('Your Password Updated Successfully.'));
    }
}
