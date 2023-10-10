<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;

class AutoLogout
{
    protected $session;
    protected $timeout;

    public function __construct(Store $session)
    {
        $this->session = $session;
        $this->timeout = (Setting::first()->logout_time * 60) ?? 900;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
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
