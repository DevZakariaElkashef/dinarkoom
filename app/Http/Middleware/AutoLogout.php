<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;

class AutoLogout
{
    protected $session;
    protected $timeout = 900; // 15 minutes

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) { // Check if the user is authenticated
            return $next($request);
        }

        if ($this->session->has('lastActivity')) {
            $lastActivity = $this->session->get('lastActivity');

            if (time() - $lastActivity > $this->timeout) {
                Auth::logout();
                $this->session->flush();
                return redirect('/login')->with('message', 'Session expired. Please log in again.');
            }
        }

        $this->session->put('lastActivity', time());

        return $next($request);
    }
}