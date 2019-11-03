<?php

namespace App\Http\Middleware;

use Closure;

class MdPenyewa
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
        if (!empty(auth()->user()->tipeakun)) {
            if (auth()->user()->tipeakun!="customer") {
            return redirect("/login/penyewa");
            } else {
                return $next($request);

            }
        }else{
            return redirect("/login/penyewa");
        } 
    }
}
