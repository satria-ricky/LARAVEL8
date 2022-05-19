<?php

namespace App\Http\Middleware;

use Closure;
use Facade\Ignition\Exceptions\ViewExceptionWithSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->level == 0) {
            return $next($request);
        }

        return  abort(403, 'Unauthorized action.');
    }
}
