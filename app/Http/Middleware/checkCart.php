<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;

class checkCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Cart::count() == 0){
            return redirect()->intended('/');
        }
        return $next($request);
    }
}
