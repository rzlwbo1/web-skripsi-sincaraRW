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

        // logic middleware sendiri untuk fitur administrator

        // ketika guest atau login bukan si rizalbow, maka abort
        // rizalbow adalah admin
        // if(auth()->guest() || auth()->user()->username != 'rizalbow') {
        //     abort(403);
        // }


        // NEW ada is admin field
        // ketika guest kasih abort
        // atau login itu admin? kalo admin di buat false, maka abort
        if(auth()->guest() || ! auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
