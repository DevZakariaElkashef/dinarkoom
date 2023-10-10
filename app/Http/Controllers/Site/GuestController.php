<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GuestController extends Controller
{
    public function register()
    {
        return view('site.auth.guest_login');
    }


    public function store(Request $request)
    {
        // Validate the guest registration form input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'civil_id' => 'required|string',
            'phone' => 'required|string',
            'addition_phone' => 'required|string',
        ]);

        $geust = User::where([
            ['email', $request->email],
            ['civil_id', $request->civil_id],
            ['phone', $request->phone],
            ['addition_phone', $request->addition_phone],
        ])->first();
        if ($geust) {
            // Log in the newly created user
            Auth::guard('guest')->login($geust);
        }

        // Create a new guest user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'civil_id' => $validatedData['civil_id'],
            'phone' => $validatedData['phone'],
            'addition_phone' => $validatedData['addition_phone'],
            'is_guest' => true, // Set the user as a guest
            'role' => 3

        ]);

        $user->assignRole('guest');

        // Log in the newly created user
        Auth::guard('guest')->login($user);

        return back()->with('message', __("Wellcome") . $user->name);
    }
}
