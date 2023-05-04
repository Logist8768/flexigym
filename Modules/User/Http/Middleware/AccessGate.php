<?php

namespace Modules\User\Http\Middleware;

use Illuminate\Http\Request;

class AccessGate
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        return $next($request);
    }
}
