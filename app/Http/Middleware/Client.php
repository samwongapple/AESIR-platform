<?php

namespace App\Http\Middleware;

use Closure;

class Client
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
        if (!auth()->user()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role == 'client') {
            return $next($request);
        }

        if (auth()->user()->role ==  'therapist') {
            return redirect('/therapist/' . auth()->user()->id);
        }
    }
}
