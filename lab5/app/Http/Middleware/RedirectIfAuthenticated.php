<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectIfAuthenticated extends Middleware
{
    protected $redirectTo = '/home';

    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectTo);
            }
        }

        return $next($request);
    }
}
