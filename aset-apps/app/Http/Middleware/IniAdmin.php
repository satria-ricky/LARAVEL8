<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IniAdmin
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
        if(auth()->guest()){
            abort(403);
        }elseif(auth()->user()->user_level == 2){
            abort(403);
        }
        return $next($request);
    }
}
