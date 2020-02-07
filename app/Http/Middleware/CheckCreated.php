<?php

namespace App\Http\Middleware;

use Closure;

class CheckCreated
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
        if (auth()->user()->role == 'client'){
            if (auth()->user()->client){
                return redirect()->back();
            }
            else {
                return $next($request);
            }
        }

        if (auth()->user()->role == 'therapist'){
            if (auth()->user()->therapist){
                return redirect()->back();
            }
            else {
                return $next($request);
            }
        }
    }
}
