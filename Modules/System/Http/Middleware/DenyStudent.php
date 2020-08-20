<?php

namespace Modules\System\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DenyStudent
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
        if(auth()->check()){
            if(auth()->user()->type != 'Employee'){
                return abort(403, 'Only employees are allowed to access this application.');
            }
        }
        return $next($request);
    }
}
