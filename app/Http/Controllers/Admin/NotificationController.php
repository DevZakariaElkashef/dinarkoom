<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(10);

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::all();
        return view('dashboard.notifications.create', compact('users'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
