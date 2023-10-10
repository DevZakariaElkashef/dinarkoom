<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplayContactRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::whereNull('replay_id')->orderBy('status')->latest()->paginate(10);
        return view('dashboard.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReplayContactRequest $request)
    {
        $admin = $request->user();
        $mess = ContactUs::find($request->replay_id);
        $mess->status = 1;
        $mess->save();

        ContactUs::create([
            'name' => $admin->name,
            'email' => $admin->email,
            'phone' => $admin->phone,
            'message' => $request->content,
            'replay_id' => $request->replay_id
        ]);

        return back()->with('message', __("replaying successfullay"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
