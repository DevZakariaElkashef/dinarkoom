<?php


namespace App\View\Composers;

use App\Models\Notification;
use App\Models\Setting;
use Illuminate\View\View;

class  NotificationComposer
{
    public function compose(View $view): void
    {
        if (auth()->check()) {
            $notifications = auth()->user()->notifications;
        } else {
            $notifications = null;
        }
        $view->with('notifications', $notifications);
    }
}