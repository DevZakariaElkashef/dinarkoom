<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class AutoLogout
{
    protected $session;
    protected $timeout;

    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = (Setting::first()->logout_time * 60) ?? 900;
    }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) { // Check if the user is authenticated
            return $next($request);
        }

        if ($this->session->has('lastActivity')) {
            $lastActivity = $this->session->get('lastActivity');

            if (time() - $lastActivity > $this->timeout) {
                // turn off online
                $user = $request->user();
                $user->is_online = 0;
                $user->save();

                Auth::logout();
                $this->session->flush();
                return redirect('/login')->with('message', __("Session expired. Please log in again."));
            }
        }

        $this->session->put('lastActivity', time());

        return $next($request);
    }
}