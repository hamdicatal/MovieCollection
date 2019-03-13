<?php

namespace App\Http\Middleware;

use Closure;

use Auth; // for accessing current logged user

class AdminAccess
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
        // check if user has admin role or not
        if(Auth::user()->hasAnyRole('admin')) {
            // if pass the test, will be continue
            return $next($request);
        }

        // if not pass the test, will be redirect to home page
        return redirect('home')->with('message', 'Sorry, you have no permission for this operation.');

    }
}
