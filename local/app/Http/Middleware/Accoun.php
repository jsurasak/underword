<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class Accoun
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
        if (Auth::user()->level != 3 && Auth::user()->level != 0) {
            Alert::warning('Not permission');
            return redirect('/');
        } else {
            return $next($request);
        }
    }
}
