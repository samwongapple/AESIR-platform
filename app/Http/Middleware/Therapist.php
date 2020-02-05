<?php

namespace App\Http\Middleware;

use Closure;

class Therapist
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

        if (auth()->user()->role == 'therapist') {
            return $next($request);
        }

        if (auth()->user()->role ==  'client') {
            return redirect('/client/' . auth()->user()->id);
        }
    }
}
