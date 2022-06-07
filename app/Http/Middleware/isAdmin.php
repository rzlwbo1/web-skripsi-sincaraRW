<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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

        // logic middleware sendiri

        // ketika guest atau login bukan si rizalbow, maka abort
        // rizalbow adalah admin
        if(auth()->guest() || auth()->user()->username != 'rizalbow') {
            abort(403);
        }

        return $next($request);
    }
}
