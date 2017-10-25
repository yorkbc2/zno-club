<?php

namespace App\Http\Middleware;

use Closure;

class NonProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->get('user_session')) {
            return $next($request);
        }
        else {
            return redirect('/profile');
        }
    }
}
