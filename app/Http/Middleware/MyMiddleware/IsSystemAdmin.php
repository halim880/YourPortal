<?php

namespace App\Http\Middleware\MyMiddleware;

use Closure;
use Illuminate\Http\Request;

class IsSystemAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->hasRole('super_admin')) {
            return $next($request);
        }
        abort(401, "You are not allowed for this action");
    }
}
