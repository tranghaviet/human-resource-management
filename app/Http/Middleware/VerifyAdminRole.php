<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdminRole
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
        if (\Auth::user()->hasRole('admin')) {
            return $next($request);
        }
        abort(403);
    }
}
