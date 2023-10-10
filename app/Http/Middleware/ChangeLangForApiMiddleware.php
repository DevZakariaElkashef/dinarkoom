<?php

namespace App\Http\Middleware;

use App\Http\Traits\BaseTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangeLangForApiMiddleware
{
    use BaseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->header('lang');

        if ($lang != null){
            
            if (!in_array($lang, ['en', 'ar', 'ur', 'fil'])) {
                return $this->sendError(__("Sorry, I do not know the required language"));
            }
            app()->setLocale($lang);
        }

        return $next($request);
    }
}
