<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendNotificationsRequest;
use App\Models\Notification;
use App\Models\User;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->get();
        // dd($notifications);

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.notifications.create', compact('users'));
    }

    public function store(SendNotificationsRequest $request)
    {
        foreach($request->users as $user) {
            Notification::create([
                'user_id' => $user,
                'title_en' => $request->title_en,
                'body_en' => $request->body_en,
                'title_ar' => $request->title_ar,
                'body_ar' => $request->body_ar,
                'title_ur' => $request->title_ur,
                'body_ur' => $request->body_ur,
                'title_fil' => $request->title_fil,
                'body_fil' => $request->body_fil,
            ]);
        }

        return back()->with('message', __("Notification Sent Successfully"));

    }

    public function destroy($id)
    {
        Notification::findOrfail($id)->delete();

        return back()->with('message', __("Notification Deleted Successfully"));
    }
}
