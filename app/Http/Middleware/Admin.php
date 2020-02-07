<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()->role=='admin'){
            return $next($request);
        }
        if (auth()->user()->role=='client'){
            if (!auth()->user()->client){
                return redirect('/client/create');
            }
            else{
                return redirect('/client/' . auth()->user()->client->id);
            }
        }
        elseif (auth()->user()->role=='therapist') {
            if (!auth()->user()->therapist){
                return redirect('/therapist/create');
            }
            else{
                return redirect('/therapist/' . auth()->user()->therapist->id);
            }
        }
        else {
            return redirect('/home');
        }
    }
}
